<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Answer;



class EditorQuiz extends Component
{
    protected $listeners = ['output' => 'handleOutput'];

    public $editorId;
    public $code;
    public $ans = 0;
    public $options;
    public $correct;
    public $solved = '';
    public $text = 'Läs koden nedan och försök lista ut vad programmet skriver ut. Kör programmet efter du svarat och se om du fick rätt.';
    public $correct_text = 'Rätt!';
    public $wrong_text = 'Du klarar det på nästa försök!';

    public function handleOutput($id, $code, $output) {
        if($id == $this->editorId) {
            if($this->ans == $this->correct) {
                $this->solved = True;
                $this->emit('solvedTask', $this->editorId);
            }
            else {
                $this->solved = False;
                $this->emit('notSolvedTask', $this->editorId);
            }

            $user = Auth::id();
            if($user) {
                Answer::updateOrCreate(
                    ['user_id' => $user, 'code_id' => $this->editorId],
                    ['answer' => $this->ans, 'solved' => $this->solved]
                );
            }

        }

    }

    public function mount() {
        $user = Auth::id();
        if($user) {
            $answer = Answer::where('user_id', $user)->where('code_id', $this->editorId)->first();
            if($answer) {
                $this->ans = $answer->answer;
                if($answer->solved)
                    $this->solved = True;
            }
        }
    }

    public function render()
    {
        return view('livewire.editor-quiz');
    }

    public function select($option) {
        $this->emit('answerSelected', $this->editorId);
        $this->ans = $option;
    }

    public function regret() {
        $this->ans = 0;
        $this->solved = '';
        $this->emit('resetOutput', $this->editorId);
    }
}
