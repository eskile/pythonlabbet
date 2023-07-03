<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Save;
use App\Models\Task;

class TeacherFreeCode extends Component
{
    // use HandleOutputTrait;
    // use SavedCodeTrait;

    protected $listeners = ['output' => 'handleOutput'];

    public $editorId;
    public $task;
    public $rows;
    public $code;
    public $user_logged_in = false;
    public $largeCanvas = False;
    public $canvas = False;
    public $projectName = '';
    public $name;

    public function toggleCanvas() {
        $this->canvas = !$this->canvas;
        $this->largeCanvas = False;
    }

    public function toggleLargeCanvas() {
        $this->largeCanvas = !$this->largeCanvas;
        $this->canvas = False;
    }
    
    public function handleOutput($id, $code, $output) {}

    public function render()
    {
        return view('livewire.teacher-free-code');
    }

    
}
