<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Course;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleSocialiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Course::class, 'welcome']);
// Route::get('/grundkurs', function () {
//     return view('basics.index');
// });
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);

Route::get('/koda', function() {
    return view('code');
});
Route::get('/om-pythonlabbet', function() {
    return view('om');
});
Route::get('/resurser', function() {
    return view('resources');
});
Route::get('/sekretesspolicy', function() {
    return view('policy');
});

Route::get('kurser', [Course::class, 'index']);
Route::get('grundkurs', [Course::class, 'basics'])->name('basics');
Route::get('grundkurs-del-2', [Course::class, 'basics2'])->name('basics-2');
Route::get('turtle', [Course::class, 'turtle'])->name('turtle');

Route::get('/grundkurs/introduktion', function () {
    return view('basics.start', ['home' => route('basics',[],false), 'next' => route('basics.print',[],false)]);
})->name('basics.introduction')->middleware('user.settings');

Route::get('/grundkurs/skriva-ut', function () {
    return view('basics.print', ['home' => route('basics',[],false),'prev' => route('basics.introduction',[],false), 'next' => route('basics.simple-calc',[],false)]);
})->name('basics.print')->middleware('user.settings');

Route::get('/grundkurs/enkla-berakningar', function () {
    return view('basics.simple-calc', ['home' => route('basics',[],false),'prev' => route('basics.print',[],false), 'next' => route('basics.variables',[],false)]);
})->name('basics.simple-calc')->middleware('user.settings');

Route::get('/grundkurs/variabler-och-datatyper', function () {
    return view('basics.variables', ['home' => route('basics',[],false),'prev' => route('basics.simple-calc',[],false), 'next' => route('basics.input',[],false)]);
})->name('basics.variables')->middleware('user.settings');

Route::get('/grundkurs/indata-med-input', function () {
    return view('basics.input', ['home' => route('basics',[],false),'prev' => route('basics.variables',[],false), 'next' => route('basics.logic',[],false)]);
})->name('basics.input')->middleware('user.settings');

Route::get('/grundkurs/logiska-uttryck', function () {
    return view('basics.logic', ['home' => route('basics',[],false),'prev' => route('basics.input',[],false), 'next' => route('basics.if',[],false)]);
})->name('basics.logic')->middleware('user.settings');

Route::get('/grundkurs/if-satsen', function () {
    return view('basics.if', ['home' => route('basics',[],false),'prev' => route('basics.logic',[],false), 'next' => route('basics.while',[],false)]);
})->name('basics.if')->middleware('user.settings');

Route::get('/grundkurs/while-satsen', function () {
    return view('basics.while', ['home' => route('basics',[],false),'prev' => route('basics.if',[],false), 'next' => route('basics.random',[],false)]);
})->name('basics.while')->middleware('user.settings');

Route::get('/grundkurs/slumptal', function () {
    return view('basics.random', ['home' => route('basics',[],false),'prev' => route('basics.while',[],false)]);
})->name('basics.random')->middleware('user.settings');

Route::get('/grundkurs/funktioner', function () {
    return view('basics-2.functions', ['home' => route('basics-2',[],false), 'next' => route('basics-2.lists',[],false)]);
})->name('basics-2.functions')->middleware('user.settings');

Route::get('/grundkurs/listor', function () {
    return view('basics-2.lists', [ 'home' => route('basics-2',[],false), 'prev' => route('basics-2.functions', [],false), 'next' => route('basics-2.for', [], false) ]);
})->name('basics-2.lists')->middleware('user.settings');

Route::get('/grundkurs/for-satsen', function () {
    return view('basics-2.for', [ 'home' => route('basics-2',[],false), 'prev' => route('basics-2.lists',[],false), 'next' => route('basics-2.more-print', [], false) ]);
})->name('basics-2.for')->middleware('user.settings');

Route::get('/grundkurs/mer-om-print-och-annat', function () {
    return view('basics-2.more-print', [ 'home' => route('basics-2',[],false), 'prev' => route('basics-2.for',[],false), 'next' => route('basics-2.more-lists',[],false) ]);
})->name('basics-2.more-print')->middleware('user.settings');

Route::get('/grundkurs/mer-om-listor', function () {
    return view('basics-2.more-lists', [ 'home' => route('basics-2',[],false), 'prev' => route('basics-2.more-print',[],false), 'next' => route('basics-2.tuples',[],false) ]);
})->name('basics-2.more-lists')->middleware('user.settings');

Route::get('/grundkurs/tupler', function () {
    return view('basics-2.tuples', [ 'home' => route('basics-2',[],false), 'prev' => route('basics-2.more-lists',[],false), 'next' => route('basics-2.math',[],false) ]);
})->name('basics-2.tuples')->middleware('user.settings');

Route::get('/grundkurs/matematiska-funktioner', function () {
    return view('basics-2.math', [ 'home' => route('basics-2',[],false), 'prev' => route('basics-2.tuples',[],false), 'next' => route('basics-2.dictionary',[],false) ]);
})->name('basics-2.math')->middleware('user.settings');

Route::get('/grundkurs/lexikon', function () {
    return view('basics-2.dictionary', [ 'home' => route('basics-2',[],false), 'prev' => route('basics-2.math',[],false), 'next' => route('basics-2.set',[],false) ]);
})->name('basics-2.dictionary')->middleware('user.settings');

Route::get('/grundkurs/mangder', function () {
    return view('basics-2.set', [ 'home' => route('basics-2',[],false), 'prev' => route('basics-2.dictionary',[],false) ]);
})->name('basics-2.set')->middleware('user.settings');


Route::get('/turtle/introduktion', function () {
    return view('turtle.introduction', ['home' => route('turtle',[],false), 'next' => route('turtle.circles',[],false)]);
})->name('turtle.introduction')->middleware('user.settings');

Route::get('/turtle/cirklar', function () {
    return view('turtle.circles', ['home' => route('turtle',[],false), 'prev' => route('turtle.introduction',[],false), 'next' => route('turtle.variables-repetition',[],false)]);
})->name('turtle.circles')->middleware('user.settings');

Route::get('/turtle/variabler-och-repetitioner', function () {
    return view('turtle.variables-repetition', ['home' => route('turtle',[],false), 'prev' => route('turtle.circles',[],false), 'next' => route('turtle.functions',[],false)]);
})->name('turtle.variables-repetition')->middleware('user.settings');

Route::get('/turtle/funktioner', function () {
    return view('turtle.functions', ['home' => route('turtle',[],false), 'prev' => route('turtle.variables-repetition',[],false), 'next' => route('turtle.random',[],false)]);
})->name('turtle.functions')->middleware('user.settings');

Route::get('/turtle/rita-med-slumpen', function () {
    return view('turtle.random', ['home' => route('turtle',[],false), 'prev' => route('turtle.functions',[],false), 'next' => route('turtle.coordinates',[],false)]);
})->name('turtle.random')->middleware('user.settings');

Route::get('/turtle/koordinatsystemet', function () {
    return view('turtle.coordinates', ['home' => route('turtle',[],false), 'prev' => route('turtle.random',[],false), 'next' => route('turtle.tasks',[],false)]);
})->name('turtle.coordinates')->middleware('user.settings');

Route::get('/turtle/fler-uppgifter', function () {
    return view('turtle.tasks', ['home' => route('turtle',[],false), 'prev' => route('turtle.coordinates',[],false), 'next' => route('turtle.recursion-fractals',[],false)]);
})->name('turtle.tasks')->middleware('user.settings');

Route::get('/turtle/rekursion-och-fraktaler', function () {
    return view('turtle.recursion-fractals', ['home' => route('turtle',[],false), 'prev' => route('turtle.tasks',[],false)]);
})->name('turtle.recursion-fractals')->middleware('user.settings');

Route::get('/problemlosning', [ProblemController::class, 'index']);
Route::get('/problemlosning/multiplikationstabellen', function() {
    return view('problems.practice-multiplication');
})->name('problem.multiplication-table');
Route::get('/problemlosning/medelvardet', function() {
    return view('problems.average');
})->name('problem.average');
Route::get('/problemlosning/gottfried-leibniz-formel', function() {
    return view('problems.pi-gottfried-leibniz');
})->name('problem.pi-gottfried-leibniz');
Route::get('/problemlosning/summan-av-tarningskast', function() {
    return view('problems.dice-sum');
})->name('problem.dice-sum');
Route::get('/problemlosning/ratvinklig-triangel', function() {
    return view('problems.pythagoras-check');
})->name('problem.pythagoras-check');
Route::get('/problemlosning/uppskatta-pi-med-slumptal', function() {
    return view('problems.pi-monte-carlo');
})->name('problem.pi-monte-carlo');
Route::get('/problemlosning/sannolikhet-ett-over-n', function() {
    return view('problems.probability-one-over-n');
})->name('problem.probability-one-over-n');
Route::get('/problemlosning/multiplar-av-3-och-5', function() {
    return view('problems.euler-multiples-3-5');
})->name('problem.euler-multiples-3-5');
Route::get('/problemlosning/jämna-fibonacci-tal', function() {
    return view('problems.euler-even-fibonacci-numbers');
})->name('problem.euler-even-fibonacci-numbers');
Route::get('/problemlosning/största-primfaktor', function () { //redirect
    return redirect('/problemlosning/storsta-primfaktor');
});
Route::get('/problemlosning/storsta-primfaktor', function() {
    return view('problems.euler-largest-prime-factor');
})->name('problem.euler-largest-prime-factor');
Route::get('/problemlosning/kvadratsumma-differens', function() {
    return view('problems.euler-sum-square-difference');
})->name('problem.euler-sum-square-difference');
Route::get('/problemlosning/berakna-uttrycket', function() {
    return view('problems.simple-expression');
})->name('problem.simple-expression');
Route::get('/problemlosning/rektangelns-omkrets', function() {
    return view('problems.circumference-rectangle');
})->name('problem.circumference-rectangle');
Route::get('/problemlosning/vilket-programmeringssprak', function() {
    return view('problems.if-else');
})->name('problem.if-else');
Route::get('/problemlosning/lan-med-ranta', function() {
    return view('problems.loan-interest');
})->name('problem.loan-interest');
Route::get('/problemlosning/veckodag', function() {
    return view('problems.weekday');
})->name('problem.weekday');

Route::get('/blogg/advent-of-code-2021', function() {
    return view('blog.advent-of-code-2021');
});

Route::get('/exempel/newton-pi', function() {
    return view('example.newton-pi');
});
Route::get('/exempel/advent-of-code-2021-dag-4', function() {
    return view('example.aoc21-day4');
});
Route::get('/exempel/advent-of-code-2021-dag-5', function() {
    return view('example.aoc21-day5');
});
Route::get('/min-klass', [TeacherController::class, 'myClass']);
Route::get('/mina-sidor', [MyPageController::class, 'myPage']);
Route::get('/larare', [TeacherController::class, 'index']);
Route::get('/larare/behover-hjalp', [TeacherController::class, 'studentNeedHelp']);
Route::get('/larare/klasser/fri-kod/{class}', [TeacherController::class, 'freeCodeInfo']);
Route::get('/larare/klasser/{class}', [TeacherController::class, 'classInfo']);
Route::get('/larare/klasser/{class}/{course}', [TeacherController::class, 'classInfo']);
Route::get('/larare/installningar/{class}', [TeacherController::class, 'settings']);
Route::get('/larare/elever/{student}', [TeacherController::class, 'studentInfo']);
Route::get('/larare/skapa-elevkonto', [TeacherController::class, 'createAccounts']);
Route::get('/larare/ta-bort-konto', [TeacherController::class, 'deleteAccounts']);
Route::get('/larare/lagg-till-elev-till-klass', [TeacherController::class, 'addStudentToClass']);
Route::get('/larare/andra-losenord', function() {
    return view('teacher.change-password');
});
Route::get('/larare/uppgifter/{student}/{code_id}', [TeacherController::class, 'studentCode']);
Route::get('/larare/fri-kod/{student}/{save_id}', [TeacherController::class, 'freeCode']);

Route::get('/admin', [AdminController::class, 'index'])->middleware('only.admin');
Route::get('/admin/teacher-feedback', [AdminController::class, 'teacherFeedback'])->middleware('only.admin');
Route::get('/admin/feedback', [AdminController::class, 'feedback'])->middleware('only.admin');
Route::get('/admin/update-solutions', [AdminController::class, 'updateSolutions'])->middleware('only.admin');
Route::get('/admin/login/{user_id}', [AdminController::class, 'login'])->middleware('only.admin');
Route::get('/admin/users', [AdminController::class, 'usersPaginated'])->middleware('only.admin');
Route::get('/admin/teachers', [AdminController::class, 'teachers'])->middleware('only.admin');
Route::get('/admin/make-teacher/{user_id}', [AdminController::class, 'makeTeacher'])->middleware('only.admin');
Route::get('/admin/classes', [AdminController::class, 'classes'])->middleware('only.admin');
Route::get('/admin/classes/{class_id}', [AdminController::class, 'class'])->middleware('only.admin');
Route::get('/admin/all/{user_id}', [AdminController::class, 'list'])->middleware('only.admin');
Route::get('/admin/problems/{user_id}/{code_id}', [AdminController::class, 'single'])->middleware('only.admin');
Route::get('/admin/problems/{user_id}', [AdminController::class, 'problems'])->middleware('only.admin');
Route::get('/admin/error-fix', [AdminController::class, 'errorFix'])->middleware('only.admin');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

