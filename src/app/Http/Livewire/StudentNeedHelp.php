<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\TeacherFeedback;


class StudentNeedHelp extends Component
{
    public $need_help;

    public function mount() {
        $this->refreshNeedHelp();
    }

    public function markComplete($student_id, $code_id) {
        TeacherFeedback::updateOrCreate(
            ['teacher_id' => Auth::id(), 'student_id' => $student_id, 'code_id' => $code_id],
            ['need_help' => 0]
        );
        $this->refreshNeedHelp();
    }

    public function refreshNeedHelp() {
        $this->need_help = DB::table('teacher_feedback')
            ->where('teacher_id', Auth::id())
            ->where('need_help', true)
            ->join('users', 'users.id', '=', 'teacher_feedback.student_id')
            ->join('student_classes', 'student_classes.user_id', '=', 'teacher_feedback.student_id')
            ->join('teacher_classes', 'student_classes.class_id', '=', 'teacher_classes.id')
            ->leftJoin('task_infos', 'teacher_feedback.code_id', '=', 'task_infos.code_id')
            ->leftJoin('problems', 'teacher_feedback.code_id', '=', 'problems.id')
            ->select('users.name', 'teacher_feedback.code_id', 'teacher_feedback.student_id', 'task_infos.name as section', 'problems.name as problem_name')
            ->get();
    }

    public function render()
    {
        return view('livewire.student-need-help');
    }
}
