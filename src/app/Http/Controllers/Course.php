<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Completed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Course extends Controller
{
    public function welcome() {
        $basics = $this->get_completed('basics');
        $turtle = $this->get_completed('turtle');
        return view('welcome', ['basics' => $basics, 'turtle' => $turtle]);
    }

    public function index() {
        $basics = $this->get_completed('basics');
        $basics2 = $this->get_completed('basics-2');
        $turtle = $this->get_completed('turtle');
        return view('courses', ['basics' => $basics, 'basics2' => $basics2, 'turtle' => $turtle]);
    }

    public function basics() {
        $basics = $this->get_completed('basics');
        $basics2 = $this->get_completed('basics-2');
        return view('basics.index', ['basics' => $basics, 'basics2' => $basics2]);
    }

    public function basics2() {
        $completed = $this->get_completed('basics-2');
        return view('basics-2.index', ['basics2' => $completed]);
    }

    public function turtle() {
        $completed = $this->get_completed('turtle');
        return view('turtle.index', ['turtle' => $completed]);
    }

    private function get_completed($course_name) {
        $user = Auth::id();
        $completed = array();
        
        if($user) {
            $course = DB::table('courses')->where('name', $course_name)->first();
            $completed = DB::table('completed')->where('user_id', $user)
                ->join('course_sections', function ($join) use($course) {
                    $join->on('completed.section','=','course_sections.section')
                        ->where('course_sections.course_id', $course->id);
                })->pluck('completed.section')->toArray();
        }
        return $completed;

    }

}
