<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Save;
use App\Models\SolvedProblem;
use App\Models\Problem;

class EditorProblem extends Component
{
    use TeacherFeedbackTrait;

    public $saveTextToDatabase = true; //save problem text to database
    public $code;
    public $editorId;
    public $solved = '';
    public $solvedOnce = false;
    public $rows = '';
    public $showReset = true;
    public $title = 'Lös problemet här';
    public $text = 'Skriv din kod nedan.';
    public $correct_text = 'Rätt!';
    public $wrong_text = 'Inte helt rätt...';

    public $useDoneButton = false;

    public $correctInput;
    public $correctOutput;

    protected $listeners = ['correct-output' => 'handleCorrect', 'output' => 'handleRun', 'problemText'];
    public $originalCode;

    public function render()
    {
        return view('livewire.editor-problem');
    }

    public function mount($code, $correctInput, $correctOutput) {
        $this->originalCode = $code;
        $this->correctInput = json_decode($correctInput);
        $this->correctOutput = json_decode($correctOutput);

        $user = Auth::id();
        if($user) {
            $savedCode = Save::where('user_id', $user)->where('code_id', $this->editorId)->first();
            if($savedCode) {
                $this->code = $savedCode->code;
            }
            $solved_problem = SolvedProblem::where('user_id', $user)->where('problem', $this->editorId)->first();
            if($solved_problem) {
                 $this->solved = $solved_problem->solved;
                 if($this->solved) {
                    $this->solvedOnce = true;
                 }
            }
        }
    }

    public function problemText($text) {
        $problem = Problem::where('id', $this->editorId)->first();
        $problem->text = $text;
        if(isset($this->correctInput) && !empty($this->correctInput))
            $problem->correct_input = serialize($this->correctInput);
        if(isset($this->correctOutput) && !empty($this->correctOutput))
            $problem->correct_output = serialize($this->correctOutput);
        $problem->save();
    }

    public function correctClick() {
        $this->emit('correct-click', $this->editorId, $this->correctInput, '');
    }

    public function handleCorrect($id, $output, $code) {
        if($id == $this->editorId) {
            $output = json_decode($output);
            $userId = Auth::id();
            if( $output == $this->correctOutput ) {
                $this->solved = true;
                $this->solvedOnce = true;
                
                if($userId) {
                    if($this->solved) {
                        $solved_problem_record = SolvedProblem::updateOrCreate(
                            ['user_id' => $userId, 'problem' => $this->editorId],
                            ['solved' => true]   
                        );
                        if(!$this->solvedOnce) {
                            $solved_problem_record->increment('attempts');
                        }
                    }
                }

                DB::table('statistics')->where('code_id', $id)->increment('total_solved');
                if(!$userId) {
                    DB::table('statistics')->where('code_id', $id)->increment('guest_solved');
                }
            }
            else {
                $this->solved = false;
                
                //increment attempts if not solved once
                if($userId && !$this->solvedOnce) {
                    SolvedProblem::updateOrCreate(
                        ['user_id' => $userId, 'problem' => $this->editorId]   
                    )->increment('attempts');
                }

            }
            DB::table('statistics')->where('code_id', $id)->increment('total_attempts');
            if(!$userId) {
                DB::table('statistics')->where('code_id', $id)->increment('guest_attempts');
            }

            //save if solved or if not solved before
            if($userId) {
                if($this->solved || !$this->solvedOnce) { 
                    $save = Save::updateOrCreate(
                        ['user_id' => $userId, 'code_id' => $this->editorId],
                        ['code' => $code]
                    );
                }
            }
        }
    }

    public function handleRun($id, $code, $output) {
        if(!$this->solved && $id == $this->editorId) {
            $userId = Auth::id();
            if($userId && !$this->solvedOnce) {
                $save = Save::updateOrCreate(
                    ['user_id' => $userId, 'code_id' => $this->editorId],
                    ['code' => $code]
                );
            }
        }
    }

    public function resetCode() {
        $this->emit('reset', $this->editorId, $this->originalCode);
    }

    public function markDone() {
        $this->solved = true;
        $userId = Auth::id();
        if($userId) {
            SolvedProblem::updateOrCreate(
                ['user_id' => $userId, 'problem' => $this->editorId],
                ['solved' => true]   
            )->increment('attempts');
        }
    }

    public function unMarkDone() {
        $this->solved = false;
        $userId = Auth::id();
        if($userId) {
            SolvedProblem::updateOrCreate(
                ['user_id' => $userId, 'problem' => $this->editorId],
                ['solved' => false]
            )->increment('attempts');
        }


    }
}
