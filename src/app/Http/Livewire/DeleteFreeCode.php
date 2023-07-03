<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Save;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DeleteFreeCode extends Component
{
    public $saves;

    protected $listeners = ['delete-project' => 'deleteProject'];

    public function mount() {
        $this->saves = Save::where('user_id',Auth::id())->where('code_id','free-code')->pluck('name', 'id');
    }

    public function deleteProject($id) {
        //verify user has save
        if(isset($this->saves[$id]))
        {
            Save::where('id',$id)->delete();
            $this->mount();
        }
        
    }

    public function render()
    {
        return view('livewire.delete-free-code');
    }
}
