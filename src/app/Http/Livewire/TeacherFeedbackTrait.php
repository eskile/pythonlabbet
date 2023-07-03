<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\StudentClass;
use App\Models\TeacherClass;
use App\Models\TeacherFeedback;
use App\Models\Save;

trait TeacherFeedbackTrait {
    public $teacherId = null;
    public $showFeedback = false;
    public $feedback = null;
    public $help_button = false;
    public $help_requested = false;

    public function mountTeacherFeedbackTrait() {
        if(Auth::id()) {
            $class_id = StudentClass::where('user_id', Auth::id())->pluck('class_id')->first();
            if($class_id) {
                $this->teacherId = TeacherClass::where('id', $class_id)->pluck('user_id')->first();
                $this->help_button = true;
                $this->feedback = TeacherFeedback::where('student_id', Auth::id())->where('code_id', $this->editorId)->first();
                if($this->feedback) {
                    $this->help_requested = $this->feedback->need_help;
                }
            }
        }
    }

    public function getListeners() {
        return $this->listeners + ['help-request-save-code' => 'saveCode'];
    }

    //has_teacher is true
    public function help() {
        $teacher_feedback = TeacherFeedback::updateOrCreate(
            ['teacher_id' => $this->teacherId, 'student_id' => Auth::id(), 'code_id' => $this->editorId],
            ['need_help' => 1]
        );
        $this->emit('help-request', $this->editorId);
        $this->help_requested = true;
    }

    public function abortHelp() {
        $teacher_feedback = TeacherFeedback::updateOrCreate(
            ['teacher_id' => $this->teacherId, 'student_id' => Auth::id(), 'code_id' => $this->editorId],
            ['need_help' => 0]
        );
        $this->help_requested = false;
    }

    public function updateFeedback() {
        $this->feedback = TeacherFeedback::where('student_id', Auth::id())->where('code_id', $this->editorId)->first();
    }

    public function hideFeedback() {
        $teacher_feedback = TeacherFeedback::updateOrCreate(
            ['teacher_id' => $this->teacherId, 'student_id' => Auth::id(), 'code_id' => $this->editorId],
            ['view' => 0]
        );
        $this->feedback->view = false;
    }

    public function saveCode($id, $code) {
        if($id == $this->editorId) {
            $save = Save::updateOrCreate(
                ['user_id' => Auth::id(), 'code_id' => $this->editorId],
                ['code' => $code]
            );
        }
    }
    


}