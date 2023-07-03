<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TeacherClass;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class DeleteClass extends Component
{

    public $classes;
    public $selectedClass = -1;
    public $selectedClassName;
    public $showAccounts = false;
    public $students = array();
    public $deleteComplete = false;
    public $continueWithDeletion = false;

    public function mount() 
    {
        $this->classes = TeacherClass::where('user_id', Auth::id())->pluck('class')->toArray();
        Log::info($this->classes);
    }

    public function render()
    {
        return view('livewire.delete-class');
    }

    public function updatedSelectedClass($value) {
        if($this->selectedClass != -1) {
            //get class account emails
            $class_id = TeacherClass::where('user_id', Auth::id())->where('class', $this->classes[$this->selectedClass])->pluck('id');
            $this->students = DB::table('student_classes')
            ->where('class_id', $class_id)
            ->rightJoin('users', 'users.id', '=', 'student_classes.user_id')
            ->select('users.id', 'users.name', 'users.email')
            ->get();
            $this->showAccounts = true;
            $this->selectedClassName = $this->classes[$this->selectedClass];
        }
        else {
            $this->showAccounts = false;
            $this->students = array();
        }
        $this->continueWithDeletion = false;
        $this->deleteComplete = false;


    }

    public function continueDelete() {
        $this->continueWithDeletion = true;
    }

    public function doDelete() {
        $class_id = TeacherClass::where('user_id', Auth::id())->where('class', $this->classes[$this->selectedClass])->pluck('id');
        Log::info('Deleting class ' . $this->classes[$this->selectedClass] . '(id = ' . $class_id . ')');
        foreach($this->students as $student) {
            Log::info('Deleting user ' . $student['id']);
            DB::table('users')->where('id', $student['id'])->delete();
            DB::table('answers')->where('user_id',$student['id'])->delete();
            DB::table('completed')->where('user_id',$student['id'])->delete();
            DB::table('saves')->where('user_id',$student['id'])->delete();
            DB::table('solved_problems')->where('user_id',$student['id'])->delete();
            DB::table('tasks')->where('user_id',$student['id'])->delete();
            DB::table('teacher_feedback')->where('student_id',$student['id'])->delete();
        }
        DB::table('teacher_classes')->where('id', $class_id)->delete();
        DB::table('student_classes')->where('class_id', $class_id)->delete();
        $this->deleteComplete = true;
        $this->mount();
        $this->continueWithDeletion = false;
    }    
}
