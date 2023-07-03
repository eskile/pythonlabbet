<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\TaskInfo;
use Illuminate\Support\Facades\Log;


trait TaskInfoToDatabaseTrait {

    //if true: saves task text to database on each load
    public $saveInfoToDatabase = true;

    public function mountTaskInfoToDatabaseTrait() {
        if($this->saveInfoToDatabase) {
            $task_info = TaskInfo::where('code_id', $this->editorId)->first();
            $task_info->text = $this->text;
            if(isset($this->correctAnswer) && !empty($this->correctAnswer))
                $task_info->correct_answer = serialize($this->correctAnswer);
            if(isset($this->correctInput) && !empty($this->correctInput))
                $task_info->correct_input = serialize($this->correctInput);
            if(isset($this->correctOutput) && !empty($this->correctOutput))
                $task_info->correct_output = serialize($this->correctOutput);
            $task_info->save();
        }
        

    }

}