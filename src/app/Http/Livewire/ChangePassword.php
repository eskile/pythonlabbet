<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Component
{
    public $students;
    public $id_change = 0;
    public $pwd;
    public $message = '';

    public function updateId($id) {
        $this->id_change = $id;
        $this->message = '';
        $this->pwd = '';
        //Log::debug($this->students);
    }

    public function changePwd($id) {
        Log::debug($this->pwd);
        $this->message = 'Ändrat! Nytt lösenord: ' . $this->pwd;
        try {
            $user = User::where('id',$id)->first();
            if(empty($user)) {
                $this->message = 'Något gick fel.';
                return;
            }
            $user->password = Hash::make(trim($this->pwd));
            $user->save();
        } catch(Throwable $e) {
            $this->message = 'Något gick fel.';
        }
    }

    public function render()
    {
        $user = Auth::user();
        if(!($user && $user->is_teacher)) {
            abort(401);
        }
        $this->students = DB::table('teacher_classes')
            ->join('student_classes', 'student_classes.class_id','=','teacher_classes.id')
            ->where('teacher_classes.user_id', $user->id)
            ->join('users', 'student_classes.user_id', '=', 'users.id')
            ->select('users.id', 'users.name', 'users.email')
            ->get();
        //Log::debug($this->students);
        return view('livewire.change-password');
    }
}
