<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Mail\WelcomeTeacher;

use Illuminate\Support\Facades\Mail;

class MakeTeacher extends Component
{
    public $userName;
    public $userEmail;
    public $userIsTeacher;
    public $sendEmailAllowed = false;

    public function render()
    {
        return view('livewire.make-teacher');
    }

    public function makeTeacher() {
        $user = User::where('email', $this->userEmail)->first();
        $user->is_teacher = true;
        $user->save();

        $updatedUser = User::where('email', $this->userEmail)->first();
        if($updatedUser->is_teacher) {
            $this->sendEmailAllowed = true;
            $this->userIsTeacher = true;
        }
    }

    public function unMakeTeacher() {
        $user = User::where('email', $this->userEmail)->first();
        $user->is_teacher = false;
        $user->save();

        $updatedUser = User::where('email', $this->userEmail)->first();
        if(!$updatedUser->is_teacher) {
            $this->userIsTeacher = false;
            $this->sendEmailAllowed = false;
        }
    }

    public function sendEmail() {
        Mail::to($this->userEmail)->send(new WelcomeTeacher());
        $this->sendEmailAllowed = false;
    }
}
