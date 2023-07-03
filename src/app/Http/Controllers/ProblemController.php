<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Problem;
use App\Models\SolvedProblem;
use Illuminate\Support\Facades\Auth;

class ProblemController extends Controller
{
    public function index() {
        $user = Auth::id();
        $solved_problems = array();
        
        $problems = Problem::orderBy('difficulty')->orderBy('name')->paginate(20);

        if($user) {
            $solved_problems = SolvedProblem::where('user_id', $user)->where('solved', 1)->pluck('problem')->toArray();
        }
        return view('problems.problems-index', ['problems' => $problems, 'solved_problems' => $solved_problems] );
    }
}
