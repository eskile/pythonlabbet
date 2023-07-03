<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\ClassSetting;

class ChangeUserSettings extends Component
{
    public $class_id;
    public $class;
    public $settings;
    public $class_settings;

    public function easymodeCheckboxUpdate($key, $state) {
        $user = $this->settings[$key];
        if($state)
            $state = true;
        else
            $state = false;
        DB::table('user_settings')->where('user_id', $user['id'])->update(['easy_mode' => $state]);
    }

    public function easymodeAll($easy_mode) {
        foreach($this->settings as $user) {
            DB::table('user_settings')->where('user_id', $user['id'])->update(['easy_mode' => $easy_mode]);
        }
        DB::table('class_settings')->where('class_id', $this->class_id)->update(['easy_mode' => $easy_mode]);
    }

    public function solutionCheckboxUpdate($key, $state) {
        $user = $this->settings[$key];
        if($state)
            $state = true;
        else
            $state = false;
        DB::table('user_settings')->where('user_id', $user['id'])->update(['show_solutions' => $state]);
    }

    public function solutionAll($show_solutions) {
        foreach($this->settings as $user) {
            DB::table('user_settings')->where('user_id', $user['id'])->update(['show_solutions' => $show_solutions]);
        }
        DB::table('class_settings')->where('class_id', $this->class_id)->update(['show_solutions' => $show_solutions]);
    }

    public function videoCheckboxUpdate($key, $state) {
        $user = $this->settings[$key];
        if($state) //show_videos = true
            $state = true;
        else
            $state = false;
        DB::table('user_settings')->where('user_id', $user['id'])->update(['show_videos' => $state]);
    }

    public function videoAll($show_video) {
        foreach($this->settings as $user) {
            DB::table('user_settings')->where('user_id', $user['id'])->update(['show_videos' => $show_video]);
        }
        DB::table('class_settings')->where('class_id', $this->class_id)->update(['show_videos' => $show_video]);
    }

    public function render()
    {
        $this->settings = DB::table('student_classes')
            ->where('class_id', $this->class_id)
            ->rightJoin('users', 'users.id', '=', 'student_classes.user_id')
            ->leftJoin('user_settings', 'users.id', '=', 'user_settings.user_id')
            ->select('users.id','users.name', 'user_settings.easy_mode','user_settings.show_solutions','user_settings.show_videos', )
            ->orderBy('users.name')
            ->get()
            ->toArray();
        $this->class_settings = ClassSetting::firstOrCreate(
            ['class_id' => $this->class_id]
        )->toArray();
        Log::debug($this->settings);
        Log::debug($this->class_settings);

        return view('livewire.change-user-settings');
    }
}
