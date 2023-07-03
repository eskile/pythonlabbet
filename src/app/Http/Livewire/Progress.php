<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Completed;
use App\Models\TaskInfo;
use App\Models\QuizInfo;
//use App\Models\Answer;
//use App\Models\Task;

class Progress extends Component
{
    public $tasks = array();
    public $section, $nr_section_quizes, $nr_section_tasks, $user;
    protected $listeners = ['registerTask' => 'register', 'solvedTask' => 'solved', 'notSolvedTask' => 'notSolved'];
    
    public function mount() {
        $this->nr_section_quizes = QuizInfo::where('section',$this->section)->pluck('code_id')->count();
        $this->nr_section_tasks = TaskInfo::where('section',$this->section)->pluck('code_id')->count();
        $this->user = Auth::id();
        $this->checkComplete($this->user);
    }

    public function register($name, $solved) 
    {
        if($solved == True)
            $this->tasks[$name] = True;
        else
            $this->tasks[$name] = null;
    }

    public function notSolved($name) {
        $this->tasks[$name] = False;
    }

    public function solved($name) {
        $this->tasks[$name] = True;
        $this->checkComplete($this->user);
  
        //TODO: this code is unnecessary. On the other hand not hurting.
        if($this->user && array_sum($this->tasks) == count($this->tasks)) { //all solved
            Completed::firstOrCreate(
                ['user_id' => $this->user, 'section' => $this->section]
            );
        }
    }

    private function checkComplete($user) {
        if($this->user && isset($this->nr_section_quizes) && isset($this->nr_section_tasks) ) {
            $nr_answers = DB::table('answers')
                ->where('user_id',$this->user)
                ->where('solved', true)
                ->join('quiz_infos','answers.code_id','=','quiz_infos.code_id')
                ->where('quiz_infos.section',$this->section)
                ->count();
            $nr_tasks = DB::table('tasks')
                ->where('user_id',$this->user)
                ->where('completed',true)
                ->join('task_infos','tasks.code_id','=','task_infos.code_id')
                ->where('task_infos.section',$this->section)
                ->count();
            if($this->nr_section_quizes == $nr_answers && $this->nr_section_tasks == $nr_tasks)
            {
                Log::debug('SECTION ' . $this->section . ' SOLVED!');
                Completed::firstOrCreate(
                    ['user_id' => $this->user, 'section' => $this->section]
                );
            }
        }
    }

    public function render()
    {
        return view('livewire.progress');
    }
}
