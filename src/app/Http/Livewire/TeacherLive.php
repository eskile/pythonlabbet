<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class TeacherLive extends Component
{
    public $nr_students;

    public function mount() {
        $this->refresh();
    }

    public function refresh() {
        $this->nr_students = DB::table('teacher_feedback')
            ->where('teacher_id', Auth::id())
            ->where('need_help', true)
            ->count();
    }

    public function render()
    {
        return view('livewire.teacher-live');
    }
}
