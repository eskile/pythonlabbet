<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Feedback;

class FeedbackLivewire extends Component
{
    public $section;
    public $ratingIsSet = false;
    public $textIsSet = false;
    public $rating;
    public $text;
    public $user;

    public function mount() {
        $user = Auth::id();
        $this->user = $user;
        $feedback = Feedback::where('user_id', $user)->where('page', $this->section)->first();
        if($feedback) {
            $this->ratingIsSet = true;
            $this->rating = $feedback->rating;
            if($feedback->text !== null) {
                $this->textIsSet = true;
            }

        }
    }

    public function render()
    {
        return view('livewire.feedback-livewire');
    }

    public function rate($rating) {
        
        Feedback::firstOrCreate(
            ['user_id' => $this->user, 'page' => $this->section],
            ['rating' => $rating]
        );
        $this->ratingIsSet = true;
        $this->rating = $rating;
    }

    public function hideTextArea() {
        $this->textIsSet = true;
        Feedback::where('user_id', $this->user)->where('page', $this->section )
            ->update(['text' => '']);
    }

    public function submitFeedback() {
        $this->textIsSet = true;
        Feedback::where('user_id', $this->user)->where('page', $this->section )
            ->update(['text' => $this->text]);
    }
}
