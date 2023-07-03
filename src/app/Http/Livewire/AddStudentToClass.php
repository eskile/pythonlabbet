<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\StudentToClass;
use App\Models\TeacherClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Mail;

class AddStudentToClass extends Component
{
    public $text = '';
    public $error_text = '';
    public $sent = false;
    public $class = '';
    public $school = '';
    public $selectedClass = '';
    public $classes = array();
    public $students = array();
    public $add_ids = array();

    public function mount() {
        $this->classes = TeacherClass::where('user_id', Auth::id())->pluck('class')->toArray();
    }

    public function createNew() {
        $this->error_text = "";
        if($this->class == '') {
            $this->error_text = "Fyll i klassnamn";
            return;
        }
        $this->class = preg_replace('/\s+/', '', $this->class);
        $this->new_users = array();
        $this->students = preg_split("/\\r\\n|\\r|\\n/", $this->text);
        //check all
        $row = 1;
        
        if(empty($this->text)) {
            $this->error_text = "Skriv in användare i textrutan enligt instruktion.";
            return;
        }
        foreach($this->students as $email) {
            if(!$email) continue; //empty row?
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error_text = "Rad " . $row . " är ingen e-post: " . $email;
                return;
            }
            $row += 1;
        }

        foreach($this->students as $email) {
            //check email
            $student = User::where('email', $email)->first();
            if($student != null) {
                array_push($this->add_ids, $student->id);
            }
        }

        //create TeacherClass
        if(in_array($this->class, $this->classes)) {
            $teacherClass = TeacherClass::where('user_id', Auth::id())->where('class', $this->class)->first();
        }
        else {
            $teacherClass = new TeacherClass;
            $teacherClass->user_id = Auth::id();
            $teacherClass->class = $this->class;
            $teacherClass->save();
        }

        

        //create users
        foreach($this->add_ids as $student_id) {
            try {
                StudentToClass::firstOrCreate(
                    ['student_id' => $student_id], 
                    ['teacher_id' => Auth::id(),
                    'class_id' => $teacherClass->id]
                );

            } catch(Throwable $e) {
                report($e);
                $this->error_text = "Fel vid skapandet av användare med e-post: " . $new_user[1] . ".";
                Log::error($this->new_users); //Todo: notify admin!
                return;
            }
        }
        $this->sent = true;
    }

    public function updatedSelectedClass($value) {
        if($this->selectedClass != '') {
            $this->class = $this->selectedClass;
        }
    }

    public function render()
    {
        return view('livewire.add-student-to-class');
    }
}
