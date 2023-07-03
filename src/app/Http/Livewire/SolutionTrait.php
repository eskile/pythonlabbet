<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Save;
use App\Models\Task;

trait SolutionTrait {

    public $show_solution = false;
    public $solution_code;

    public function mountSolutionTrait() {
        if(request()->session()->get('show_solutions')) {
            $this->solution_code = DB::table('solutions')->where('code_id', $this->editorId)->pluck('code')->first();
        }
    }

    public function showSolution($editorId) {
        $this->show_solution = true;
        $this->emit('show-solution-' . $editorId);
    }

}