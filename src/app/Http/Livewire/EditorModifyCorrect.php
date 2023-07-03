<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Save;
use App\Models\Task;

class EditorModifyCorrect extends Component
{
    use SavedCodeTrait;
    use TeacherFeedbackTrait;
    use TaskInfoToDatabaseTrait;
    use SolutionTrait;

    public $code;
    public $editorId;
    public $correctAnswer = '';
    public $solved = '';
    public $rows = '';
    public $showReset = true;
    public $title = 'Hitta felet';
    public $text = 'Koden nedan innehåller fel. Det är upp till dig att fixa till koden.';
    public $correct_text = 'Rätt!';
    public $wrong_text = 'Inte helt rätt...';
    public $add_code = '';
    public $tip_text = '';
    public $show_tip = false;

    public $correctInput;
    public $correctOutput;

    protected $listeners = ['correct-output' => 'handleCorrect', 'output' => 'handleRun'];
    public $originalCode;

    public function render()
    {
        return view('livewire.editor-modify-correct');
    }

    public function mount($code, $correctInput, $correctOutput, $add_code = '') {
        $this->originalCode = $code;
        $this->correctInput = json_decode($correctInput);
        $this->correctOutput = json_decode($correctOutput);
        $this->add_code = $add_code;

    }

    public function correctClick() {
        $this->emit('correct-click', $this->editorId, $this->correctInput, $this->add_code);
    }

    public function handleCorrect($id, $output, $code) {
        if($id == $this->editorId) {
            $userId = Auth::id();
            $output = json_decode($output);
            if( $output == $this->correctOutput ) {
                $this->solved = true;
                $this->emit('solvedTask', $this->editorId);

                DB::table('statistics')->where('code_id', $id)->increment('total_solved');
                if(!$userId) {
                    DB::table('statistics')->where('code_id', $id)->increment('guest_solved');
                }
            }
            else {
                $this->solved = false;
                $this->emit('notSolvedTask', $this->editorId);

            }
            DB::table('statistics')->where('code_id', $id)->increment('total_attempts');
            if(!$userId) {
                DB::table('statistics')->where('code_id', $id)->increment('guest_attempts');
            }

            if($userId) {
                //don't save if solved before and now failed
                if($this->solved || !$this->solvedOnce) {
                    $save = Save::updateOrCreate(
                        ['user_id' => $userId, 'code_id' => $this->editorId],
                        ['code' => $code]
                    );
                }

                Task::updateOrCreate(
                    ['user_id' => $userId, 'code_id' => $this->editorId],
                    ['completed' => $this->solved]   
                );
            }
        }
    }

    public function handleRun($id, $code, $output) {
        if($id == $this->editorId) {
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
}
