<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use Auth;
use Log;
use App\Models\UserSettings;

class TeacherSettings extends Component
{
    public $easy_mode;
    public $show_videos;

    public function mount() {
        $settings = DB::table('user_settings')
            ->where('user_id', Auth::id())
            ->first();

        //create settings if doesn't exit
        if(!$settings) {
            UserSettings::create([
                'user_id' => Auth::id()
            ]);
            $settings = DB::table('user_settings')
                ->where('user_id', Auth::id())
                ->first();
        }
        $this->easy_mode = $settings->easy_mode;
        $this->show_videos = $settings->show_videos;
    }

    public function videoCheckboxUpdate($state) {
        if($state) //show_videos = true
            $state = true;
        else
            $state = false;
        DB::table('user_settings')->where('user_id', Auth::id())->update(['show_videos' => $state]);
    }

    public function easymodeCheckboxUpdate($state) {
        if($state) //easy_mode = true
            $state = true;
        else
            $state = false;
        DB::table('user_settings')->where('user_id', Auth::id())->update(['easy_mode' => $state]);
    }

    public function render()
    {
        return view('livewire.teacher-settings');
    }
}
