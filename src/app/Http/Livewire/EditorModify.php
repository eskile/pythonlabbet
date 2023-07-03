<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Save;

class EditorModify extends Component
{
    use HandleOutputTrait;
    use SavedCodeTrait;
    use TeacherFeedbackTrait;
    use TaskInfoToDatabaseTrait;
    use SolutionTrait;

    public $code;
    public $editorId;
    public $correctAnswer;
    public $solved = '';
    public $title = 'Hitta felet';
    public $text = 'Koden nedan innehåller fel. Det är upp till dig att fixa till koden.';
    public $correct_text = 'Rätt!';
    public $wrong_text = 'Inte helt rätt...';
    public $tip_text = '';
    public $show_tip = false;

    protected $listeners = ['output' => 'handleOutput'];
    public $originalCode;

    public function render()
    {
        return view('livewire.editor-modify');
    }

    public function mount($code) {
        $this->originalCode = $code;
    }

    public function resetCode() {
        $this->emit('reset', $this->editorId, $this->originalCode);
    }

}
