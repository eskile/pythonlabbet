<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Save;
use App\Models\Task;

class EditorCanvasModify extends Component
{
    use SavedCodeTrait;
    use TeacherFeedbackTrait;
    use TaskInfoToDatabaseTrait;
    use SolutionTrait;

    public $code;
    public $editorId;
    public $solved = '';
    public $rows = '';
    public $showReset = true;
    public $title = 'Hitta felet';
    public $text = 'Koden nedan innehåller fel. Det är upp till dig att fixa till koden.';
    public $add_code = '';
    public $tip_text = '';
    public $show_tip = false;

    protected $listeners = ['correct-output' => 'handleCorrect', 'output' => 'handleRun'];
    public $originalCode;

    public function render()
    {
        return view('livewire.editor-canvas-modify');
    }

    public function mount($code, $add_code = '') {
        $this->originalCode = $code;
        $this->add_code = $add_code;

    }

    // public function correctClick() {
    //     $this->emit('correct-click', $this->editorId, $this->correctInput, $this->add_code);
    // }

    public function correctClick() {
        $userId = Auth::id();
        if( !$this->solved ) {
            $this->solved = true;
            $this->emit('solvedTask', $this->editorId);

            DB::table('statistics')->where('code_id', $this->editorId)->increment('total_solved');
            if(!$userId) {
                DB::table('statistics')->where('code_id', $this->editorId)->increment('guest_solved');
            }
        }
        else {
            $this->solved = false;
            $this->emit('notSolvedTask', $this->editorId);

        }
        DB::table('statistics')->where('code_id', $this->editorId)->increment('total_attempts');
        if(!$userId) {
            DB::table('statistics')->where('code_id', $this->editorId)->increment('guest_attempts');
        }

        if($userId) {
            //don't save if solved before and now failed
            Task::updateOrCreate(
                ['user_id' => $userId, 'code_id' => $this->editorId],
                ['completed' => $this->solved]   
            );
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
