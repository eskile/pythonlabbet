<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Save;
use App\Models\Task;
use App\Models\TaskInfo;
use App\Models\SolvedProblem;
use App\Models\Problem;
use App\Models\TeacherFeedback;


class TeacherView extends Component
{
    public $code;
    public $editorId;
    public $correctAnswer;
    public $solved = '';
    public $rows = '';
    public $showReset = true;
    public $title = 'Lös problemet här';
    //public $text = 'Skriv din kod nedan.';
    public $text = '';
    public $feedback = '';
    public $need_help = false;
    public $use_canvas = false;

    public $studentId = null;
    public $studentName = '';
    public $student_has_viewed = false;
    public $saveIsDisabled = false;
    public $is_problem = false;

    public $correct_text = 'Uppgiften är löst.';
    public $wrong_text = 'Ej löst';

    public $correctInput;
    public $correctOutput;

    protected $listeners = ['correct-output' => 'handleCorrect', 'output' => 'handleRun'];
    public $originalCode;

    public function render()
    {
        return view('livewire.teacher-view');
    }

    public function mount($code, $correctInput, $correctOutput, $user) {
        $this->originalCode = $code;
        $this->correctInput = json_decode($correctInput);
        $this->correctOutput = json_decode($correctOutput);

        if($user) {
            $this->studentId = $user;
            $savedCode = Save::where('user_id', $user)->where('code_id', $this->editorId)->first();
            if($savedCode) {
                $this->code = $savedCode->code;
            }
            $solved_problem = SolvedProblem::where('user_id', $user)->where('problem', $this->editorId)->first();
            if($solved_problem) { //problem
                $this->is_problem = true;
                $this->solved = $solved_problem->solved;
                $this->text = Problem::where('id', $this->editorId)->pluck('text')->first();
                if($this->solved)
                    $this->correct_text = 'Problemet är löst (antal försök: ' . $solved_problem->attempts . ').';
                else
                    $this->wrong_text = '(Antal försök: ' . $solved_problem->attempts . ').';
            }
            else { //task
                $this->solved = Task::where('user_id', $user)->where('code_id', $this->editorId)->pluck('completed')->first();
                $task_info = TaskInfo::where('code_id', $this->editorId)->first();
                if($task_info) {
                    $this->text = $task_info->text;
                    if(isset($task_info->canvas))
                        $this->use_canvas = true;
                }
                

            }
            $teacher_feedback = TeacherFeedback::where('teacher_id', Auth::id())->where('student_id', $user)->where('code_id', $this->editorId)->first();
            if($teacher_feedback) {
                $this->feedback = $teacher_feedback->feedback;
                $this->need_help = $teacher_feedback->need_help;
            }

        }
    }

    public function correctClick() {
        $this->emit('correct-click', $this->editorId, $this->correctInput, '');
    }

    public function saveFeedback() {
        if($this->studentId) {
            $teacher_feedback = TeacherFeedback::updateOrCreate(
                ['teacher_id' => Auth::id(), 'student_id' => $this->studentId, 'code_id' => $this->editorId],
                ['feedback' => $this->feedback, 'view' => 1, 'need_help' => 0]
            );
            $this->saveIsDisabled = true;
        }

    }

    public function editFeedback() {
        $this->saveIsDisabled = false;
    }

    public function handleCorrect($id, $output) {
        if($id == $this->editorId) {
            $output = json_decode($output);
            $userId = Auth::id();
            if( $output == $this->correctOutput ) {
                //$this->solved = true;
                // $this->emit('solvedTask', $this->editorId);
                if($userId) {
                    // if($this->solved)
                    // SolvedProblem::updateOrCreate(
                    //     ['user_id' => $userId, 'problem' => $this->editorId],
                    //     ['solved' => true]   
                    // )->increment('attempts');
                }
            }
            else {
                //$this->solved = false;
                // $this->emit('notSolvedTask', $this->editorId);
                

            }
        }
    }

    public function handleRun($id, $code, $output) {
        if($id == $this->editorId) {
            $userId = Auth::id();
            if($userId) {
                // $save = Save::updateOrCreate(
                //     ['user_id' => $userId, 'code_id' => $this->editorId],
                //     ['code' => $code]
                // );
            }
        }
    }

    public function resetCode() {
        $this->emit('reset', $this->editorId, $this->originalCode);
    }
}
