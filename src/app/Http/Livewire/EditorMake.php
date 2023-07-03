<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Save;
use App\Models\Task;

class EditorMake extends Component
{
    use HandleOutputTrait;
    use SavedCodeTrait;
    use TeacherFeedbackTrait;
    use TaskInfoToDatabaseTrait;
    use SolutionTrait;

    protected $listeners = ['output' => 'handleOutput'];

    public $editorId;
    public $text;
    public $rows;
    public $answer = array('');
    public $correctAnswer;
    public $correct_text = 'Rätt!';
    public $wrong_text = 'Inte helt rätt...';
    public $tip_text = '';
    public $show_tip = false;

    public function render()
    {
        return view('livewire.editor-make');
    }

    
}
