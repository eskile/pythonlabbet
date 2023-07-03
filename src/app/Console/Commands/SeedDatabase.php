<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Course;
use App\Models\Section;
use App\Models\CourseSection;
use App\Models\Problem;
use App\Models\Statistics;
use App\Models\TaskInfo;
use App\Models\QuizInfo;

use Illuminate\Support\Facades\Log;

class SeedDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeding the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // COURSE 1A - Basics part 1
        $course = Course::firstOrCreate([
            'name' => 'basics', 
            'sections' => 2, 
            'order' => 1
        ]);

        Section::firstOrCreate(['name' => 'basics.introduction']);
        Section::firstOrCreate(['name' => 'basics.print']);
        Section::firstOrCreate(['name' => 'basics.simple-calc']);
        Section::firstOrCreate(['name' => 'basics.variables']);
        Section::firstOrCreate(['name' => 'basics.input']);
        Section::firstOrCreate(['name' => 'basics.logic']);
        Section::firstOrCreate(['name' => 'basics.if']);
        Section::firstOrCreate(['name' => 'basics.while']);
        Section::firstOrCreate(['name' => 'basics.random']);

        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'basics.introduction',
            'next_section' => 'basics.print',
        ]);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'basics.print',
            'prev_section' => 'basics.introduction',
            'next_section' => 'basics.simple-calc',
        ]);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'basics.simple-calc',
            'prev_section' => 'basics.print',
            // 'next_section' => 'basics.variables',
        ]);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'basics.variables',
        ]);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'basics.input',
        ]);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'basics.logic',
        ]);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'basics.if',
        ]);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'basics.while',
        ]);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'basics.random',
        ]);


        // COURSE 1B - Basics part 2
        $course = Course::updateOrCreate(
            ['name' => 'basics-2'], 
            ['sections' => 9, 
            'order' => 2]
        );

        Section::firstOrCreate(['name' => 'basics-2.functions']);
        Section::firstOrCreate(['name' => 'basics-2.lists']);
        Section::firstOrCreate(['name' => 'basics-2.for']);
        Section::firstOrCreate(['name' => 'basics-2.more-print']);
        Section::firstOrCreate(['name' => 'basics-2.more-lists']);
        Section::firstOrCreate(['name' => 'basics-2.tuples']);
        Section::firstOrCreate(['name' => 'basics-2.math']);
        Section::firstOrCreate(['name' => 'basics-2.dictionary']);
        Section::firstOrCreate(['name' => 'basics-2.set']);

        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'basics-2.functions',
        ]);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'basics-2.lists',
        ]);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'basics-2.for',
        ]);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'basics-2.more-print',
        ]);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'basics-2.more-lists',
        ]);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'basics-2.tuples',
        ]);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'basics-2.math',
        ]);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'basics-2.dictionary',
        ]);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'basics-2.set',
        ]);

        $course = Course::updateOrCreate(
            ['name' => 'turtle'], 
            ['sections' => 9, 
            'order' => 3]
        );
        Section::firstOrCreate(['name' => 'turtle.introduction']);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'turtle.introduction',
        ]);
        Section::firstOrCreate(['name' => 'turtle.circles']);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'turtle.circles',
        ]);
        Section::firstOrCreate(['name' => 'turtle.variables-repetition']);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'turtle.variables-repetition',
        ]);
        Section::firstOrCreate(['name' => 'turtle.functions']);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'turtle.functions',
        ]);
        Section::firstOrCreate(['name' => 'turtle.random']);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'turtle.random',
        ]);
        Section::firstOrCreate(['name' => 'turtle.coordinates']);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'turtle.coordinates',
        ]);
        Section::firstOrCreate(['name' => 'turtle.tasks']);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'turtle.tasks',
        ]);
        Section::firstOrCreate(['name' => 'turtle.recursion-fractals']);
        CourseSection::firstOrCreate([
            'course_id' => $course->id, 
            'section' => 'turtle.recursion-fractals',
        ]);

        // PROBLEM SECTION
        Problem::updateOrCreate(
            ['id' => 'problem.average'],
            ['name' => 'Beräkna medelvärdet',
            'age_group' => 1,
            'difficulty' => 2,
            'prerequisite' => 1]
        );
        Problem::updateOrCreate(
            ['id' => 'problem.pi-gottfried-leibniz'],
            ['name' => 'Beräkna pi med Gottfried Leibniz formel',
            'age_group' => 2,
            'difficulty' => 2,
            'prerequisite' => 1]
        );
        Problem::updateOrCreate(
            ['id' => 'problem.multiplication-table'],
            ['name' => 'Träna multiplikationstabellen',
            'age_group' => 1,
            'difficulty' => 2,
            'prerequisite' => 1]
        );
        Problem::updateOrCreate(
            ['id' => 'problem.dice-sum'],
            ['name' => 'Summan av tärningskast',
            'age_group' => 1,
            'difficulty' => 2,
            'prerequisite' => 1]
        );
        Problem::updateOrCreate(
            ['id' => 'problem.pythagoras-check'],
            ['name' => 'Rätvinklig triangel?',
            'age_group' => 2,
            'difficulty' => 1,
            'prerequisite' => 1]
        );
        Problem::updateOrCreate(
            ['id' => 'problem.pi-monte-carlo'],
            ['name' => 'Uppskatta pi med slumptal',
            'age_group' => 2,
            'difficulty' => 3,
            'prerequisite' => 1]
        );
        Problem::updateOrCreate(
            ['id' => 'problem.probability-one-over-n'],
            ['name' => 'Sannolikhet n händelser',
            'age_group' => 3,
            'difficulty' => 3,
            'prerequisite' => 1]
        );
        Problem::updateOrCreate(
            ['id' => 'problem.euler-multiples-3-5'],
            ['name' => 'Multiplar av 3 och 5',
            'age_group' => 2,
            'difficulty' => 2,
            'prerequisite' => 1]
        );
        Problem::updateOrCreate(
            ['id' => 'problem.euler-even-fibonacci-numbers'],
            ['name' => 'Jämna Fibonacci-tal',
            'age_group' => 2,
            'difficulty' => 2,
            'prerequisite' => 1]
        );
        Problem::updateOrCreate(
            ['id' => 'problem.euler-largest-prime-factor'],
            ['name' => 'Största primfaktor',
            'age_group' => 2,
            'difficulty' => 3,
            'prerequisite' => 1]
        );
        Problem::updateOrCreate(
            ['id' => 'problem.euler-sum-square-difference'],
            ['name' => 'Kvadratsumma differens',
            'age_group' => 2,
            'difficulty' => 2,
            'prerequisite' => 1]
        );
        Problem::updateOrCreate(
            ['id' => 'problem.simple-expression'],
            ['name' => 'Beräkna uttrycket',
            'age_group' => 2,
            'difficulty' => 1,
            'prerequisite' => 1]
        );
        Problem::updateOrCreate(
            ['id' => 'problem.circumference-rectangle'],
            ['name' => 'Rektangelns omkrets',
            'age_group' => 1,
            'difficulty' => 1,
            'prerequisite' => 1]
        );
        Problem::updateOrCreate(
            ['id' => 'problem.if-else'],
            ['name' => 'Vilket programmeringsspråk',
            'age_group' => 1,
            'difficulty' => 1,
            'prerequisite' => 1]
        );
        Problem::updateOrCreate(
            ['id' => 'problem.loan-interest'],
            ['name' => 'Lån med ränta',
            'age_group' => 2,
            'difficulty' => 1,
            'prerequisite' => 1]
        );
        Problem::updateOrCreate(
            ['id' => 'problem.weekday'],
            ['name' => 'Bestäm veckodag',
            'age_group' => 1,
            'difficulty' => 3,
            'prerequisite' => 2]
        );

        TaskInfo::updateOrCreate(
            ['code_id' => 'intro_indent'],
            ['name' => 'Introduktion:Indentera',
            'section' => 'basics.introduction']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'intro_comment'],
            ['name' => 'Introduktion:Kommentera',
            'section' => 'basics.introduction']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'print_find'],
            ['name' => 'Skriva ut text och tal:Hitta felet',
            'section' => 'basics.print']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'print_create'],
            ['name' => 'Skriva ut text och tal:Skriv ut år',
            'section' => 'basics.print']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'simple_calc_modify'],
            ['name' => 'Enkla beräkningar:Heltalsdivision',
            'section' => 'basics.simple-calc']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'simple_calc_make'],
            ['name' => 'Enkla beräkningar:Beräkning',
            'section' => 'basics.simple-calc']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'variables_modify'],
            ['name' => 'Variabler:Hitta felet',
            'section' => 'basics.variables']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'variables-round'],
            ['name' => 'Variabler:Avrunda pi',
            'section' => 'basics.variables']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'input-modify'],
            ['name' => 'Input:Cirkelns area',
            'section' => 'basics.input']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'input-make'],
            ['name' => 'Input:Triangelns area',
            'section' => 'basics.input']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'if_modify'],
            ['name' => 'If:Hitta indenteringsfelet',
            'section' => 'basics.if']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'if-make'],
            ['name' => 'If:Skapa - temperatur',
            'section' => 'basics.if']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'if_modify_menu'],
            ['name' => 'If:Ändra - meny och pannkaka',
            'section' => 'basics.if']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'if-make-elif'],
            ['name' => 'If:Skapa - Positivt, negativt eller noll',
            'section' => 'basics.if']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'while_modify_odd'],
            ['name' => 'While:Udda tal',
            'section' => 'basics.while']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'while-make-multiplication'],
            ['name' => 'While:Multiplikationstabellen',
            'section' => 'basics.while']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'random_modify'],
            ['name' => 'Slumptal:1000 slumptal',
            'section' => 'basics.random']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'random-make'],
            ['name' => 'Slumptal:Summan av två tärningskast',
            'section' => 'basics.random']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'functions-first'],
            ['name' => 'Funktioner:Enkel funktion',
            'section' => 'basics-2.functions']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'functions_modify_circle'],
            ['name' => 'Funktioner:Cirkelns omkrets till radie',
            'section' => 'basics-2.functions']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'functions-make-parameters'],
            ['name' => 'Funktioner:Omkretsen på en rektangel',
            'section' => 'basics-2.functions']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'lists_modify_input'],
            ['name' => 'Listor:Lägga till i lista och sortera',
            'section' => 'basics-2.lists']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'lists_last_make'],
            ['name' => 'Listor:Filtrera ut positiva tal',
            'section' => 'basics-2.lists']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'for_error_modify'],
            ['name' => 'For:Hitta felen',
            'section' => 'basics-2.for']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'for-make-vocals'],
            ['name' => 'For:Räkna vokaler',
            'section' => 'basics-2.for']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'for_modify_dices'],
            ['name' => 'For:Tärningskast med summa 10',
            'section' => 'basics-2.for']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'more-print-make'],
            ['name' => 'Mer om print:Skapa - summan av tal',
            'section' => 'basics-2.more-print']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'more-lists-filter'],
            ['name' => 'Mer om listor:Filtrera bort negativ tal',
            'section' => 'basics-2.more-lists']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'more-lists-modify-image'],
            ['name' => 'Mer om listor:Räkna värdet i bild',
            'section' => 'basics-2.more-lists']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'tuples-dices-modify'],
            ['name' => 'Tupler:Tre tärningskast',
            'section' => 'basics-2.tuples']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'math-modify'],
            ['name' => 'Matematiska funktioner:Cirkelns omkrets från radien',
            'section' => 'basics-2.math']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'dictionary_modify'],
            ['name' => 'Lexikon:Ändra i persondata',
            'section' => 'basics-2.dictionary']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'dictionary-create'],
            ['name' => 'Lexikon:Myran Myra',
            'section' => 'basics-2.dictionary']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'set-modify'],
            ['name' => 'Mängder:Räkna unika element',
            'section' => 'basics-2.set']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'set-modify'],
            ['name' => 'Mängder:Räkna unika element',
            'section' => 'basics-2.set']
        );

        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-intro-colored-square'],
            ['name' => 'Turtle introduktion:Färgad kvadrat',
            'canvas' => true,
            'section' => 'turtle.introduction']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-intro-create-triangle'],
            ['name' => 'Turtle introduktion:Rita triangel',
            'canvas' => true,
            'section' => 'turtle.introduction']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-circles-smiley'],
            ['name' => 'Turtle cirklar:Smiley utan linjer mellan delar',
            'canvas' => true,
            'section' => 'turtle.circles']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-circles-fill-star'],
            ['name' => 'Turtle cirklar:Fyll stjärna med färg',
            'canvas' => true,
            'section' => 'turtle.circles']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-variables-repetition-set-variables'],
            ['name' => 'Turtle variabler och repetitioner:Rita femhörning',
            'canvas' => true,
            'section' => 'turtle.variables-repetition']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-variables-repetition-modify'],
            ['name' => 'Turtle variabler och repetitioner:Spiralfigur - variera värden',
            'canvas' => true,
            'section' => 'turtle.variables-repetition']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-variables-repetition-create'],
            ['name' => 'Turtle variabler och repetitioner:Skapa valfri figur',
            'canvas' => true,
            'section' => 'turtle.variables-repetition']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-functions-triangle'],
            ['name' => 'Turtle funktioner:Liksidig triangel',
            'canvas' => true,
            'section' => 'turtle.functions']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-functions-square-color'],
            ['name' => 'Turtle funktioner:Kvadrat med kantfärg',
            'canvas' => true,
            'section' => 'turtle.functions']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-random-circle-radius'],
            ['name' => 'Turtle slump:Cirkel med slumpad radie',
            'canvas' => true,
            'section' => 'turtle.random']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-random-walk-modified'],
            ['name' => 'Turtle slump:Modifierad slumpvandring',
            'canvas' => true,
            'section' => 'turtle.random']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-random-color-grid'],
            ['name' => 'Turtle slump:100 kvadrater med slumpad färg',
            'canvas' => true,
            'section' => 'turtle.random']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-coordinates-cross'],
            ['name' => 'Turtle koordinatsystem:Rita ett kryss',
            'canvas' => true,
            'section' => 'turtle.coordinates']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-coordinates-random-circles'],
            ['name' => 'Turtle koordinatsystem:Cirklar fyllda med slumpad färg',
            'canvas' => true,
            'section' => 'turtle.coordinates']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-coordinates-random-squares'],
            ['name' => 'Turtle koordinatsystem:Slumpmässiga kvadrater',
            'canvas' => true,
            'section' => 'turtle.coordinates']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-coordinates-setup-circle'],
            ['name' => 'Turtle koordinatsystem:Cirkel som tangerar ritytan',
            'canvas' => true,
            'section' => 'turtle.coordinates']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-tasks-ukraine-flag'],
            ['name' => 'Turtle projekt:Ukrainska flaggan',
            'canvas' => true,
            'section' => 'turtle.tasks']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-tasks-sweden-flag'],
            ['name' => 'Turtle projekt:Svenska flaggan',
            'canvas' => true,
            'section' => 'turtle.tasks']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-tasks-usa-flag'],
            ['name' => 'Turtle projekt:Amerikanska flaggan',
            'canvas' => true,
            'section' => 'turtle.tasks']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-tasks-house'],
            ['name' => 'Turtle projekt:Rita ett hus',
            'canvas' => true,
            'section' => 'turtle.tasks']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-tasks-cube'],
            ['name' => 'Turtle projekt:Rita 3D-kub',
            'canvas' => true,
            'section' => 'turtle.tasks']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-tasks-graph'],
            ['name' => 'Turtle projekt:Grafer',
            'canvas' => true,
            'section' => 'turtle.tasks']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-fractals-star-7'],
            ['name' => 'Turtle fraktaler:Stjärna med sju uddar',
            'canvas' => true,
            'section' => 'turtle.recursion-fractals']
        );
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-fractals-snowflake'],
            ['name' => 'Turtle fraktaler:Hel snöflinga (Koch)',
            'canvas' => true,
            'section' => 'turtle.recursion-fractals']
        );
        
        TaskInfo::updateOrCreate(
            ['code_id' => 'turtle-fractals-snowflake'],
            ['name' => 'Turtle fraktaler:Hel snöflinga (Koch)',
            'canvas' => true,
            'section' => 'turtle.recursion-fractals']
        );

        QuizInfo::updateOrCreate(
            ['code_id' => 'print_predict'],
            ['section' => 'basics.print']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'print_predict2'],
            ['section' => 'basics.print']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'simple_calc_predict'],
            ['section' => 'basics.simple-calc']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'simple_calc_predict2'],
            ['section' => 'basics.simple-calc']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'variables_predict_add'],
            ['section' => 'basics.variables']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'input_predict'],
            ['section' => 'basics.input']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'if_predict_numbers'], //yes, wrong start of code_id
            ['section' => 'basics.logic']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'if_predict_strings'], //yes, wrong start of code_id
            ['section' => 'basics.logic']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'if_predict_trick'], //yes, wrong start of code_id
            ['section' => 'basics.logic']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'logic_predict_and_or'], //old simple_calc_predict error
            ['section' => 'basics.logic']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'if_else_predict'],
            ['section' => 'basics.if']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'if_else_predict2'],
            ['section' => 'basics.if']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'while_predict'],
            ['section' => 'basics.while']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'while_two_predict'],
            ['section' => 'basics.while']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'random_predict'],
            ['section' => 'basics.random']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'lists_basic_quiz'],
            ['section' => 'basics-2.lists']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'lists_quiz'],
            ['section' => 'basics-2.lists']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'for_predict'],
            ['section' => 'basics-2.for']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'more-print-predict-sep-end'],
            ['section' => 'basics-2.more-print']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'more-print-predict-strip-split'],
            ['section' => 'basics-2.more-print']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'more-lists-simple-slice'],
            ['section' => 'basics-2.more-lists']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'more-lists-slicing-negative'],
            ['section' => 'basics-2.more-lists']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'tuples-predict-function'],
            ['section' => 'basics-2.tuples']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'math-builtin-predict'],
            ['section' => 'basics-2.math']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'dictionary_predict'],
            ['section' => 'basics-2.dictionary']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'set-quiz'],
            ['section' => 'basics-2.set']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'turtle-quiz-intro-square'],
            ['section' => 'turtle.introduction']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'turtle-circles-quiz-area'],
            ['section' => 'turtle.circles']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'turtle-circles-quiz-star'],
            ['section' => 'turtle.circles']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'turtle-variables-repetition-circles-quiz'],
            ['section' => 'turtle.variables-repetition']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'turtle-functions-ten-squares-quiz'],
            ['section' => 'turtle.functions']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'turtle-random-quiz-circle-area'],
            ['section' => 'turtle.random']
        );
        QuizInfo::updateOrCreate(
            ['code_id' => 'turtle-coordinates-predict'],
            ['section' => 'turtle.coordinates']
        );


        $task_infos = TaskInfo::select('code_id')->get();
        foreach($task_infos as $task_info) {
            $record = Statistics::where('code_id', $task_info->code_id)->first();
            if(!$record) {
                Statistics::create(['code_id' => $task_info->code_id]);
            }
        }
        $problems = Problem::select('id')->get();
        foreach($problems as $problem) {
            $record = Statistics::where('code_id', $problem->id)->first();
            if(!$record) {
                Statistics::create(['code_id' => $problem->id]);
            }
        }
        return 0;
    }
}
