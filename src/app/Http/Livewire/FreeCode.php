<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Save;
use App\Models\Task;

class FreeCode extends Component
{
    // use HandleOutputTrait;
    // use SavedCodeTrait;

    protected $listeners = ['output' => 'handleOutput', 'save-code-event' => 'saveCode', 'new-code-event' => 'newCode', 'get-projects' => 'getProjects', 'open-project' => 'openCode'];

    public $editorId;
    public $task;
    public $rows;
    public $code;
    public $user_logged_in = false;
    public $largeCanvas = False;
    public $canvas = False;
    public $projectName = '';

    public function mount() {
        $user = Auth::id();
        if($user) {
            $this->user_logged_in = true;
            $savedCode = Save::where('user_id', $user)->where('code_id', $this->editorId)->orderBy('updated_at', 'DESC')->first();
            if($savedCode) {
                $this->code = $savedCode->code;
                if($savedCode->name != null)
                    $this->projectName = $savedCode->name;
            }
        }
    }

    public function newCode() {
        $this->projectName = '';
    }

    public function openCode($id) {
        $user = Auth::id();
        if($user) {
            $savedCode = Save::where('user_id', $user)->where('code_id', $this->editorId)->where('id',$id)->first();
            if($savedCode) {
                $this->code = $savedCode->code;
                if($savedCode->name != null)
                    $this->projectName = $savedCode->name;
                else
                    $this->projectName = '';
                $this->emit('update-code', $savedCode->code, $this->projectName);
            }
        }
    }

    public function getProjects() {
        $user = Auth::id();
        if($user) {
            $projects = Save::where('user_id', $user)->where('code_id', $this->editorId)->orderBy('updated_at', 'DESC')->pluck('name','id')->toArray();
            $this->emit('project-names',$projects);
        }
    }

    public function saveCode($code, $name, $allowOverwrite) {
        $userId = Auth::id();
        if($userId) {
            if(!$allowOverwrite) {
                if(Save::where('user_id',$userId)->where('code_id',$this->editorId)->where('name',$name)->exists()) {
                    $this->emit('message','Du har redan använt det namnet. Koden är INTE sparad.');
                    return;
                }
            }

            $save = Save::updateOrCreate(
                ['user_id' => $userId, 'code_id' => $this->editorId, 'name' => $name],
                ['code' => $code]
            );
            if($save)
                $this->emit('code-saved');
            
            $this->projectName = $name;
        }
        
        
    }

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
        return view('livewire.free-code');
    }

    
}
