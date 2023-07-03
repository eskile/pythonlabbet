<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\StudentClass;
use App\Models\TeacherClass;
use App\Models\ClassSetting;
use App\Models\UserSettings;
use App\Models\StudentToClass;
use Illuminate\Support\Facades\Log;

class MyClass extends Component
{

    public $user_id;
    public $has_class = false;
    public $class_name;
    public $has_invitation = false;
    public $invitation_class;
    public $has_error = false;
    public $error_msg = '';


    public function mount() {
        $class_id = StudentClass::where('user_id', $this->user_id)->pluck('class_id')->first(); //change from first if support for multiple classes
        if($class_id) {
            $this->class_name = TeacherClass::where('id', $class_id)->pluck('class')->first();
            $this->has_class = true;
        }
        $invite = StudentToClass::where('student_id', $this->user_id)->select('teacher_id', 'class_id')->first();
        if($invite) {   
            $this->has_invitation = true;
            $this->invitation_class = TeacherClass::where('id', $invite['class_id'])->pluck('class')->first();
        }
    }

    public function accept() {
        $invite = StudentToClass::where('student_id', $this->user_id)->select('teacher_id', 'class_id')->first();
        if(!$invite) { 
            Log::info('accept() Myclass:36: no invite found for user_id = ' . $this->user_id);
            $this->has_error = true;
            $this->error_msg = 'Hittar inte längre inbjudan. Är du redan med i klassen? Prova att ladda om den här sidan.';
            return;
        }
        StudentClass::updateOrCreate(
            ['user_id' => $this->user_id],
            ['class_id' => $invite['class_id']]
        );
        StudentToClass::where('student_id', $this->user_id)->delete();
        $this->class_name = TeacherClass::where('id', $invite['class_id'])->pluck('class')->first();
        $this->has_class = true;
        $this->has_invitation = false;

        $class_settings = ClassSetting::where('class_id', $invite['class_id'])->first();
        $usr_settings = UserSettings::where('user_id', $this->user_id)->first();
        //only new user setings if there is class setting and user doesn't already have personal setting.
        if($class_settings && !$usr_settings) {
            $user_settings = new UserSettings;
            $user_settings->user_id = $this->user_id;
            if($class_settings->show_videos !== null)
                $user_settings->show_videos = $class_settings->show_videos;
            if($class_settings->show_solutions !== null)
                $user_settings->show_solutions = $class_settings->show_solutions;
            if($class_settings->easy_mode !== null)
                $user_settings->easy_mode = $class_settings->easy_mode;

            $user_settings->save();
        }
    }

    public function render()
    {
        return view('livewire.my-class');
    }
}
