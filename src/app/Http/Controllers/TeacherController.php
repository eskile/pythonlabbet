<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Save;
use App\Models\SolvedProblem;
use App\Models\Problem;
use App\Models\User;
use App\Models\TeacherClass;
use App\Models\TeacherFeedback;
use App\Models\StudentClass;
use App\Models\TaskInfo;
use App\Models\UserSettings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TeacherController extends Controller
{
    public function index(Request $request) {
        $user = $request->user();
        $is_teacher = False;
        $teacher_class = null;
        if($user && $user->is_teacher) {
            $is_teacher = True;
            $teacher_class = TeacherClass::where('user_id', $user->id)->pluck('class')->toArray();
        }
        return view('teacher.index', ['is_teacher' => $is_teacher, 'classes' => $teacher_class]);
    }

    public function createAccounts(Request $request) {
        $user = $request->user();
        if(!($user && $user->is_teacher)) abort(401);
        return view('teacher.create-accounts', ['user' => $user]);
    }

    public function deleteAccounts(Request $request) {
        $user = $request->user();
        if(!($user && $user->is_teacher)) abort(401);
        return view('teacher.delete-accounts', ['user' => $user]);
    }

    public function addStudentToClass(Request $request) {
        $user = $request->user();
        if(!($user && $user->is_teacher)) abort(401);
        return view('teacher.add-student-to-class', ['teacher_id' => $user]);
    }

    public function myClass(Request $request) {
        $user = $request->user();
        if(!$user) abort(401); //only for logged in users
        return view('my-class', ['user_id' => $user->id]);
    }

    public function freeCodeInfo(Request $request) {
        $user = $request->user();
        if(!($user && $user->is_teacher)) {
            abort(401);
        }
        $class_id = TeacherClass::where('user_id', $user->id)->where('class', $request->route('class'))->pluck('id')->first();
        if(empty($class_id)) {
            abort(404, 'Hittar inte klass.');
        }
        $records = DB::table('student_classes')
            ->where('class_id', $class_id)
            ->rightJoin('users', 'users.id', '=', 'student_classes.user_id')
            ->leftJoin('saves', 'saves.user_id', '=', 'student_classes.user_id')
            ->where('saves.code_id','free-code')
            ->select('users.id as user_id', 'users.name as user_name', 'saves.name', 'saves.id')
            ->orderBy('users.name')
            ->get();

        return view('teacher.free-code-overview', ['records' => $records, 'class' => $request->route('class')]);


    }

    public function classInfo(Request $request) {
        $user = $request->user();
        if(!($user && $user->is_teacher)) {
            abort(401);
        }
        $class_id = TeacherClass::where('user_id', $user->id)->where('class', $request->route('class'))->pluck('id')->first();
        if(empty($class_id)) {
            abort(404, 'Hittar inte klass.');
        }

        $course = $request->route('course');
        if(!(!$course || $course == 'grundkurs-del-1' || $course == 'grundkurs-del-2' || $course == 'turtle' || $course == 'problem' ))
            abort(404);

        $progress = DB::table('student_classes')
            ->where('class_id', $class_id)
            ->rightJoin('users', 'users.id', '=', 'student_classes.user_id')
            ->leftJoin('completed', 'completed.user_id', '=', 'student_classes.user_id')
            ->select('users.id', 'users.name', 'completed.section')
            ->orderBy('users.name')
            ->get();

        $results = array();
        $names = array();
        foreach($progress as $p) {
            $names[$p->id] = $p->name;
            if(empty($results[$p->id])) 
                $results[$p->id] = array($p->section);
            else
                $results[$p->id][] = $p->section; 
        }
        if(!$course || $course == 'problem') {
            $problems_progress = DB::table('student_classes')
                ->where('class_id', $class_id)
                ->rightJoin('users', 'users.id', '=', 'student_classes.user_id')
                ->leftJoin('solved_problems', 'solved_problems.user_id', '=', 'student_classes.user_id')
                ->select('users.id', 'users.name', 'solved_problems.problem', 'solved_problems.attempts', 'solved_problems.solved')
                ->get();

            $problems_from_db = DB::table('problems')->select('id', 'name')->get();
            $problem_names = array();
            foreach($problems_from_db as $problem) {
                $problem_names[$problem->id] = $problem->name;
            }
            //create lists of problems tried
            $problem_array = array();
            foreach($problems_progress as $p) {
                if(!in_array($p->problem, $problem_array) && $p->problem != null) {
                    $problem_array[$p->problem] = $problem_names[$p->problem];
                }
            }
            asort($problem_array);
            
            //loop through progress - for each problem - create progress array (name, attempts, solved)
            $problem_matrix = array();
            foreach($names as $user_id => $user_name) {
                $problem_matrix[$user_id] = array();
            }
            foreach($problems_progress as $p) {
                if($p->problem != null) {    
                    $problem_matrix[$p->id][$p->problem] = array("attempts" => $p->attempts, "solved" => $p->solved);
                }
            }
        }

        if(!$course) 
            return view('teacher.class-progress', ['matrix' => $results, 'problem_array' => $problem_array, 'problem_matrix' => $problem_matrix, 'names' => $names, 'class' => $request->route('class')]);
        elseif($course == 'grundkurs-del-1' )
            return view('teacher.class-progress-basics1', ['matrix' => $results, 'names' => $names, 'class' => $request->route('class')]);
        elseif($course == 'grundkurs-del-2' )
            return view('teacher.class-progress-basics2', ['matrix' => $results, 'names' => $names, 'class' => $request->route('class')]);
        elseif($course == 'turtle' )
            return view('teacher.class-progress-turtle', ['matrix' => $results, 'names' => $names, 'class' => $request->route('class')]);
        elseif($course == 'problem' )
            return view('teacher.class-progress-problems', ['matrix' => $results, 'problem_array' => $problem_array, 'problem_matrix' => $problem_matrix, 'names' => $names, 'class' => $request->route('class')]);
        else
            abort(404);


    }

    public function settings(Request $request) {
        $user = $request->user();
        if(!($user && $user->is_teacher)) {
            abort(401);
        }
        $class_id = TeacherClass::where('user_id', $user->id)->where('class', $request->route('class'))->pluck('id')->first();
        if(empty($class_id)) {
            abort(404, 'Hittar inte klass.');
        }
        //check if there are student with no settings
        $no_settings = DB::table('student_classes')
            ->where('class_id', $class_id)
            ->rightJoin('users', 'users.id', '=', 'student_classes.user_id')
            ->whereNotExists(function($query)
                {
                    $query->select(DB::raw(1))
                          ->from('user_settings')
                          ->whereRaw('users.id = user_settings.user_id');
                })
            ->select('users.id')
            ->get();

        //create settings
        foreach($no_settings as $insert_obj) {
            UserSettings::create([
                'user_id' => $insert_obj->id
            ]);
        }

        return view('teacher.user-settings', ['class_id' => $class_id, 'class' => $request->route('class')]);
    }

    public function studentInfo(Request $request) {
        $user = $request->user();
        $student_id = $request->route('student');
        if(!($user && $user->is_teacher)) {
            abort(401, 'Endast för lärare');
        }
        $student_class_id = StudentClass::where('user_id', $student_id)->pluck('class_id')->first();
        $teacher_id_for_class = TeacherClass::where('id', $student_class_id)->pluck('user_id')->first();
        if($teacher_id_for_class != $user->id && $user->id != 1) {
            abort(401, 'Du är inte lärare för denna elev.');
        }
        $saves = DB::table('saves')
            ->where('user_id', $student_id)
            ->join('task_infos', 'saves.code_id', '=', 'task_infos.code_id')
            ->join('users', 'users.id', '=', 'saves.user_id')
            ->select('users.id', 'users.name', 'task_infos.name as section', 'saves.code', 'saves.code_id')
            ->get();
        $problem_saves = DB::table('saves')
            ->where('user_id', $student_id)
            ->join('problems', 'saves.code_id', '=', 'problems.id')
            ->join('users', 'users.id', '=', 'saves.user_id')
            ->select('users.id', 'users.name', 'problems.name as section', 'saves.code', 'saves.code_id')
            ->get();
        $name = User::where('id', $student_id)->pluck('name')->first();

        return view('teacher.student-info', ['saves' => $saves, 'name' => $name, 'problem_saves' => $problem_saves]);

    }

    public function studentCode(Request $request) {
        $user = $request->user();
        $student_id = $request->route('student');
        if(!($user && $user->is_teacher)) {
            abort(401);
        }
        $student_class_id = StudentClass::where('user_id', $student_id)->pluck('class_id')->first();
        $teacher_id_for_class = TeacherClass::where('id', $student_class_id)->pluck('user_id')->first();
        if($teacher_id_for_class != $user->id && $user->id != 1) {
            abort(401, 'Du är inte lärare för denna elev.');
        }

        $code_id = $request->route('code_id');

        $save = Save::where('user_id', $student_id)->where('code_id', $code_id)->pluck('code');
        $user_name = User::where('id', $student_id)->pluck('name')->first();
        $problem_name = Problem::where('id', $code_id)->pluck('name')->first();
        if(empty($problem_name)) { //not a problem
            $problem_name = TaskInfo::where('code_id', $code_id)->pluck('name')->first();
        }
        if($save)
            return view('teacher.single', [
                'code' => $save, 
                'code_id' => $code_id, 
                'name' => $user_name, 
                'user' => $student_id, 
                'problem_name' => $problem_name
            ]);
        else
            abort(404, 'Hittades ej');
    }

    public function freeCode(Request $request) {
        $user = $request->user();
        $student_id = $request->route('student');
        if(!($user && $user->is_teacher)) {
            abort(401);
        }
        $student_class_id = StudentClass::where('user_id', $student_id)->pluck('class_id')->first();
        $teacher_id_for_class = TeacherClass::where('id', $student_class_id)->pluck('user_id')->first();
        if($teacher_id_for_class != $user->id && $user->id != 1) {
            abort(401, 'Du är inte lärare för denna elev.');
        }

        $save_id = $request->route('save_id');

        $save = Save::where('user_id', $student_id)->where('code_id', 'free-code')->where('id',$save_id)->pluck('code');
        $user_name = User::where('id', $student_id)->pluck('name')->first();
        $save_name = Save::where('id', $save_id)->pluck('name')->first();

        if($save)
            return view('teacher.free-code', [
                'code' => $save, 
                'name' => $user_name, 
                'projectName' => $save_name
            ]);
        else
            abort(404, 'Hittades ej');
    }

    public function studentNeedHelp(Request $request) {
        return view('teacher.need-help');
    }

}
