<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Save;
use App\Models\Task;

trait SavedCodeTrait {

    public $solved = '';
    public $code;
    public $solvedOnce = false;

    public function mountSavedCodeTrait() {
        $user = Auth::id();
        if($user) {
            $savedCode = Save::where('user_id', $user)->where('code_id', $this->editorId)->first();
            if($savedCode) {
                $this->code = $savedCode->code;
            }
            $taskRecord = Task::where('user_id', $user)->where('code_id', $this->editorId)->first();
            if($taskRecord) {
                $this->solved = $taskRecord->completed;
                if($this->solved) {
                    $this->solvedOnce = true;
                }

            }
        }
    }

}