<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Completed;
use App\Models\Task;
use App\Models\Answer;
use App\Models\TaskInfo;
use App\Models\SolvedProblem;



class MyPageController extends Controller
{
    public function myPage(Request $request) {
        $user = $request->user();
        if(!$user)
            return redirect('/login');
        
        $last_task = Task::where('user_id', $user->id)->where('completed',true)->orderBy('updated_at','DESC')->first(); 
        $nr_completed_tasks = Task::where('user_id',$user->id)->where('completed',true)->count() + Answer::where('user_id',$user->id)->where('solved',true)->count();
        $nr_completed_sections = Completed::where('user_id', $user->id)->count();
        $nr_solved_problems = SolvedProblem::where('user_id', $user->id)->where('solved',1)->count();
        $last_task_name = null;
        if($last_task)
            $last_task_name = TaskInfo::where('code_id', $last_task->code_id)->first();
        return view('my-page', [
            'last_task' => $last_task,
            'last_task_name' => $last_task_name, 
            'nr_completed_tasks' => $nr_completed_tasks,
            'nr_completed_sections' => $nr_completed_sections,
            'nr_solved_problems' => $nr_solved_problems,
        ]);
    }
}
