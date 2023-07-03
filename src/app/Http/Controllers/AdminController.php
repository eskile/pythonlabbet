<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Save;
use App\Models\SolvedProblem;
use App\Models\Solution;
use App\Models\Problem;
use App\Models\Completed;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Answer;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index(Request $request) {
        $users = User::where('created_at','>',Carbon::now()->subDays(7) )->orderBy('created_at', 'DESC')->get();
        $completed = Completed::where('created_at','>',Carbon::now()->subDays(7) )->orderBy('created_at', 'DESC')->get();
        $feedback = Feedback::where('created_at','>',Carbon::now()->subDays(7) )->orderBy('created_at', 'DESC')->get();
        $problems = SolvedProblem::where('created_at','>',Carbon::now()->subDays(7) )->orderBy('created_at', 'DESC')->get();
        echo '<p>Användare: '. count($users) .' Sektioner: '. count($completed) .' Feedback: '. count($feedback) . ' Problem: ' . count($problems) . '</p>';
        echo '<p><a href="/admin/teachers">Lärare</a></p>';
        //$users = User::orderBy('created_at','DESC')->take(10)->get();
        echo '<h2>Users last week (' . count($users) .')</h2>';
        foreach($users as $user) {
            echo $user->created_at . ' | ' . $user->name . ' | ' . $user->email . '<br>';
        }

        
        echo '<h2>Completed sections last week (' . count($completed) .')</h2>';
        foreach($completed as $i => $complete) {
            $user = User::where('id', $complete->user_id)->pluck('name');
            $email = User::where('id', $complete->user_id)->pluck('email');
            echo $complete->created_at . ' | ' . $user[0] . ' | ' . $email[0] . ' | ' . $complete->section . '<br>';
            if($i > 50) {
                echo "OCH FLER...";
                break;
            }
        }

        
        echo '<h2>Feedback last week (' . count($feedback) .')</h2>';
        foreach($feedback as $fb) {
            $user = User::where('id', $fb->user_id)->pluck('name');
            echo $fb->created_at . ' | ' . $user[0] . ' | ' . $fb->page . ' | ' . $fb->rating . ' | ' . $fb->text . '<br>';
        }

        
        echo '<h2>Solved problems last month (' . count($problems) .')</h2>';
        foreach($problems as $problem) {
            $user = User::where('id', $problem->user_id)->pluck('name');
            if($problem->solved)
                echo $problem->created_at . ' | ' . $user[0] . ' | <a href="/admin/problems/' . $problem->user_id . '">' . $problem->problem . ' | (' . $problem->attempts . ')</a><br>';
            else
            echo '<span style="color:#ababab">' . $problem->created_at . ' | ' . $user[0] . ' | <a href="/admin/problems/' . $problem->user_id . '/' . $problem->problem . '">' . $problem->problem . ' | (' . $problem->attempts . ')</a></span><br>';
        }

        $saves = Save::where('created_at','>',Carbon::now()->subDays(7) )->orderBy('created_at', 'DESC')->get();
        echo '<h2>Saves last week (' . count($saves) .')</h2>';
        foreach($saves as $save) {
            $user = User::where('id', $save->user_id)->pluck('name');
            echo $save->created_at . ' | ' . $user[0] . ' | <a href="/admin/problems/'.$save->user_id.'/'.$save->code_id.'">' . $save->code_id . '</a><br>';
        }
    }

    //Route::get('/teacher/classes', [AdminController::class, 'classes'])->middleware('verify.access');
    public function classes(Request $request) {
        $teacher_classes = DB::table('teacher_classes')
                            ->select('id', 'class')
                            ->get();
        
        foreach($teacher_classes as $class) {
            echo '<a href="/admin/classes/'.$class->id.'/">'. $class->class .'</a><br>';

        }
    }

    //Route::get('/teacher/classes/{class_id}', [AdminController::class, 'class'])->middleware('verify.access');
    public function class(Request $request) {
        
        $class_id = $request->class_id;
        if(empty($class_id)) {
            abort(404, 'Hittar inte klass.');
        }
        //$students = StudentClass::where('class_id', $class_id)->pluck('user_id');
        $progress = DB::table('student_classes')
            ->where('class_id', $class_id)
            ->rightJoin('users', 'users.id', '=', 'student_classes.user_id')
            ->leftJoin('completed', 'completed.user_id', '=', 'student_classes.user_id')
            ->select('users.id', 'users.name', 'completed.section')
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

        return view('teacher.class-progress', ['matrix' => $results, 'names' => $names, 'class' => $request->route('class')]);

    }

    public function teacherFeedback(Request $request) {
        $feedback = DB::table('users')->where('is_teacher','=',true)->join('feedback', 'users.id','=', 'feedback.user_id')->orderBy('feedback.created_at', 'DESC')->get();
        foreach($feedback as $f) {
            echo $f->created_at . ' | ' . $f->name . ' | ' .  $f->email . ' | ' .  $f->page . ' | ' .  $f->rating . ' | ' .  $f->text . '<br>';
        }
    }

    public function feedback(Request $request) {
        $sections = DB::table('sections')->pluck('name');
        foreach($sections as $section) {
            $feedback = DB::table('feedback')->where('page', $section)->avg('rating');
            echo $section . ': ' . $feedback . '<br>';
        }
    }

    public function list(Request $request) {
        $user_id = $request->route('user_id');
        //$saves = Save::where('user_id', $user_id)->pluck('code_id');
        $saves = DB::table('saves')
            ->where('user_id', $user_id)
            ->join('task_infos', 'saves.code_id', '=', 'task_infos.code_id')
            ->select('saves.code_id', 'task_infos.name')
            ->get();

        foreach ($saves as $save) {
            echo '<a href="/admin/problems/'.$user_id.'/'.$save->code_id.'">'. $save->name .'</a><br>';
        }

        //return $saves;
    }

    public function problems(Request $request) {
        $user_id = $request->route('user_id');
        $user_name = User::where('id', $user_id)->pluck('name')->first();

        $problems = DB::table('solved_problems')->where('user_id', $user_id)
                                                ->join('problems', 'solved_problems.problem', '=', 'problems.id')->get();

        echo '<h2>Problem av ' . $user_name . '</h2>';
        foreach ($problems as $problem) {
            echo '<a href="/admin/problems/'.$user_id.'/'.$problem->id.'">'. $problem->name .'</a><br>';
        }

        //return $problems;
        //$solved_problems = SolvedProblem::where('user_id', $user_id)
    }

    public function single(Request $request) {

        $user_id = $request->route('user_id');
        $code_id = $request->route('code_id');

        $save = Save::where('user_id', $user_id)->where('code_id', $code_id)->pluck('code');
        $user_name = User::where('id', $user_id)->pluck('name')->first();
        $problem_name = Problem::where('id', $code_id)->pluck('name')->first();
        if($save)
            return view('teacher.single', ['code' => $save, 'code_id' => $code_id, 'name' => $user_name, 'user' => $user_id, 'problem_name' => $problem_name]);
        else
            abort(404, 'Hittades ej');
    }

    public function teachers(Request $request) {
        $teachers = User::where('is_teacher','=',true )->orderBy('created_at', 'DESC')->get();
        foreach($teachers as $teacher) {
            echo '<p>' . $teacher->name . ' ' . $teacher->email . ' <a href="/admin/login/' . $teacher->id . '">Log in</a></p>';
        }

    }

    public function login(Request $request) {
        $user_id = $request->route('user_id');
        if(Auth::loginUsingId($user_id)) {
            echo "<p>Inloggad.</p>";
        }
        else {
            echo "<p><b>Failed.</b></p>";
        }
        echo '<p><a href="/">Hem</a> <a href="/larare">Lärare</a></p>';
         
    }

    public function updateSolutions() {
        $user_id = DB::table('users')->where('email', 'solutions@pythonlabbet.se')->pluck('id')->first();
        $solutions = DB::table('saves')->where('user_id',$user_id)->get();
        foreach($solutions as $solution) {
            DB::table('solutions')->updateOrInsert(
                ['code_id' => $solution->code_id], ['code' => $solution->code]
            );
        }
        echo 'Done.';
    }

    public function errorFix() { //done - can be removed

        $users = DB::table('users')->select('id')->get();
        $sections = DB::table('sections')->select('name')->get();
        Log::debug($sections);
        $nr_errors = 0;
        foreach($users as $user) {
            foreach($sections as $section) {
                $nr_section_quizes = DB::table('quiz_infos')->where('section',$section->name)->pluck('code_id')->count();
                $nr_section_tasks = DB::table('task_infos')->where('section',$section->name)->pluck('code_id')->count();
                //echo $user->id . ' ' . $section->name . '<br>';

                $nr_answers = DB::table('answers')
                    ->where('user_id',$user->id)
                    ->where('solved', true)
                    ->join('quiz_infos','answers.code_id','=','quiz_infos.code_id')
                    ->where('quiz_infos.section',$section->name)
                    ->count();
                $nr_tasks = DB::table('tasks')
                    ->where('user_id',$user->id)
                    ->where('completed',true)
                    ->join('task_infos','tasks.code_id','=','task_infos.code_id')
                    ->where('task_infos.section',$section->name)
                    ->count();
                if($nr_section_quizes == $nr_answers && $nr_section_tasks == $nr_tasks)
                {
                    $record = Completed::where('user_id',$user->id)->where('section',$section->name)->first();
                    if(!$record) {
                        echo 'Error found for user ' . $user->id . '<br>'; 
                        $nr_errors += 1;
                        Completed::firstOrCreate(
                            ['user_id' => $user->id, 'section' => $section->name]
                        );
                    }
                    
                }

            }
            
        }
        echo 'Errors corrected: ' . $nr_errors;


        /*$completed = DB::table('completed')->where('section','turtle.coordinates')->select('user_id')->get();
        foreach($completed as $complete) {
            echo $complete->user_id . '<br>';
            Answer::updateOrCreate(
                ['code_id' => 'turtle-coordinates-predict', 'user_id' => $complete->user_id],
                ['answer' => 3, 'solved' => 1]
            );
        }*/
    }

}
