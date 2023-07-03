<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


use App\Models\User;

class TeacherTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    static private $migration_run = False;

    public function setUp() : void {
        parent::setUp();
        if(!self::$migration_run) {
            $this->artisan('migrate:fresh');
            $this->artisan('command:seed');
            $user = User::factory()->create(['email' => 'emil@usa.se', 'password' => bcrypt('Access83'), 'is_teacher' => True]); //1
            $user = User::factory()->create(['name' => 'The Teacher', 'is_teacher' => True]); //2
            $user = User::factory()->create(['name' => 'The Pupil']); //3
            $user = User::factory()->create(['name' => 'Fake Teacher', 'is_teacher' => True]); //4

            self::$migration_run = True;
        }
    }

    public function test_access_teacher_page_as_guest()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/larare')
                    ->assertDontSee('Du är verifierad som lärare');
        });
    }

    public function test_access_teacher_page_as_pupil()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(3);
            $browser->visit('/larare')
                    ->assertDontSee('Du är verifierad som lärare');
        });
    }

    public function test_access_teacher_page_as_teacher()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(2);
            $browser->visit('/larare')
                    ->assertSee('Du är verifierad som lärare');
        });
    }

    public function test_create_student_accounts_class() {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(2);
            $browser->visit('/larare/skapa-elevkonto')
                    ->type('#class', 'testklass')
                    ->keys('#students', 'Emil Gunnarsson, test1@usa.se, pwd12345', '{enter}','Joel Gunnarsson, test2@usa.se, pwd12345', '{enter}')
                    ->press('Skapa konton')
                    ->pause(300)
                    ->screenshot('create_class')
                    ->assertSee('Följande användare är skapade i klass testklass');

            $this->assertDatabaseHas('teacher_classes', ['user_id' => 2, 'class' => 'testklass']);
            $this->assertDatabaseHas('student_classes', ['user_id' => 5, 'class_id' => 1]); //Emil Gunnarsson
            $this->assertDatabaseHas('student_classes', ['user_id' => 6, 'class_id' => 1]);

        });
        
    }

    public function test_create_student_accounts_in_existing_class() {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(2);
            $browser->visit('/larare/skapa-elevkonto')
                    ->type('#class', 'testklass')
                    ->keys('#students', 'Elev 2, elev2@usa.se, pwd12345', '{enter}','Elev 3, elev3@usa.se, pwd12345', '{enter}')
                    ->press('Skapa konton')
                    ->pause(300)
                    ->screenshot('create_class')
                    ->assertSee('Följande användare är skapade i klass testklass');

            $this->assertDatabaseMissing('teacher_classes', ['id' => 2, 'user_id' => 2, 'class' => 'testklass']);
            $this->assertDatabaseHas('student_classes', ['user_id' => 7, 'class_id' => 1]); //Emil Gunnarsson
            $this->assertDatabaseHas('student_classes', ['user_id' => 8, 'class_id' => 1]);

        });
        
    }

    public function test_teacher_access_right() {
        $this->browse(function (Browser $browser) {
            
            $browser->loginAs(2);
            $browser->visit('/larare/elever/5')
                    ->assertSee('Elevöversikt');
        
            $browser->loginAs(4); //should not have access to student 4 even though teacher
            $browser->visit('/larare/elever/5')
                    ->assertSee('401');
                    
        });
        
    }

    public function test_request_help_from_teacher() {
        //click Begär hjälp
        $this->browse(function (Browser $browser) {
            $browser->loginAs(5);
            $browser->visit('/grundkurs/introduktion')
                    ->press('Begär hjälp')
                    ->pause(200)
                    ->screenshot('request_help')
                    ->assertSee('Hjälp begärd');
        });
        $this->assertDatabaseHas('teacher_feedback', ['teacher_id' => 2, 'student_id' => 5, 'need_help' => 1]);

        //check that teachers sees this
        $this->browse(function (Browser $browser) {
            $browser->loginAs(2);
            $browser->visit('/larare/behover-hjalp')
                    ->screenshot('who_need_help')
                    ->assertSee('Emil Gunnarsson');
        });

        $this->browse(function (Browser $browser) {
            $browser->loginAs(2);
            $browser->visit('/larare/uppgifter/5/intro_indent')
                    ->assertSee('Eleven vill ha hjälp')
                    ->type('#feedback-text', 'En kommentar.')
                    ->press('Spara kommentar')
                    ->pause(300);

        });
        
        $this->browse(function (Browser $browser) {
            $browser->loginAs(5);
            $browser->visit('/grundkurs/introduktion')
                    ->assertSee('En kommentar.');
                    //->clickLink('avbryt')
                    //->pause(200)
                    //->assertDontSee('En kommentar.');
        });
        $this->browse(function (Browser $browser) {
            $browser->loginAs(5);
            $browser->visit('/grundkurs/introduktion')
                    ->press('Begär hjälp')
                    ->pause(200)
                    ->screenshot('request_help')
                    ->assertSee('Hjälp begärd');
        });

    }

    //$saveInfoToDatabase = true; to work (in file TaskInfoToDatabaseTrait.php)
    public function test_modify_teacher_view() {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(5);
            $browser->visit('/grundkurs/introduktion')
                    ->keys('#monaco_editor-intro_indent textarea', ['{control}', 'a'], '{backspace}')
                    ->type('#monaco_editor-intro_indent textarea', 'print("0\n1\n2")')
                    ->click('#run-intro_indent')
                    ->pause(300);
        });
        $this->browse(function (Browser $browser) {
            $browser->loginAs(2);
            $browser->visit('/larare/elever/5')
                    ->assertSee('Introduktion:Indentera')
                    ->assertSee('Elevöversikt för Emil Gunnarsson');
            
            $browser->visit('/larare/uppgifter/5/intro_indent')
                    ->assertSee('Uppgiften är löst')
                    ->assertSee('Någon har missat att indentera')
                    ->assertSee('print("0\n1\n2")');
        });
    }

    //$saveInfoToDatabase = true; to work
    public function test_make_teacher_view() {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(5);
            $browser->visit('/grundkurs/skriva-ut')
                    ->type('#monaco_editor-print_create textarea', 'print("Just nu är det år\n' . date("Y") . ' ")')
                    ->click('#run-print_create')
                    ->pause(500);
        });
        $this->browse(function (Browser $browser) {
            $browser->loginAs(2);
            $browser->visit('/larare/elever/5')
                    ->screenshot('see_skriva_ut_text')
                    ->assertSee('Skriva ut text och tal:Skriv ut år')
                    ->assertSee('Elevöversikt för Emil Gunnarsson');
            
            $browser->visit('/larare/uppgifter/5/print_create')
                    ->assertSee('Uppgiften är löst')
                    ->assertSee('Skriv kod som skriver ut')
                    ->assertSee('print(');
        });
    }

    //$saveInfoToDatabase = true; to work
    public function test_modify_correct_teacher_view() {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(5);
            $browser->visit('/grundkurs/indata-med-input')
                    ->keys('#monaco_editor-input-modify textarea', ['{control}', 'a'], '{backspace}')
                    ->type('#monaco_editor-input-modify textarea', 'r = float(input("Skriv in cirkelns radie:"))')
                    ->keys('#monaco_editor-input-modify textarea', '{enter}')
                    ->type('#monaco_editor-input-modify textarea', 'print(3.14*r*r)')
                    ->click('#correct-input-modify')
                    ->pause(300)
                    ->screenshot('input-correct')
                    ->assertSee('Rätt');
        });
        $this->browse(function (Browser $browser) {
            $browser->loginAs(2);
            $browser->visit('/larare/elever/5')
                    ->assertSee('Input:Cirkeln')
                    ->assertSee('Elevöversikt för Emil Gunnarsson');
            
            $browser->visit('/larare/uppgifter/5/input-modify')
                    ->screenshot('koden_fungerar')
                    ->assertSee('Uppgiften är löst')
                    ->assertSee('Koden fungerar inte som den ska')
                    ->assertSee('3.14*r*r');
        });
    }

    public function test_add_student_to_class() {
        $user = User::factory()->create(['email' => 'test@pl.se', 'password' => bcrypt('Access83'), 'is_teacher' => False]); //9
        $this->browse(function (Browser $browser) {
            $browser->loginAs(2);
            $browser->visit('/larare/lagg-till-elev-till-klass')
                    ->assertSee('Lägg till användare')
                    ->type('#class', 'nyklass')
                    ->type('#students', 'test@pl.se')
                    ->press('Bjud in')
                    ->pause(300);
        });
        $this->assertDatabaseHas('student_to_classes', ['student_id' => 9, 'class_id' => 2]); //Emil Gunnarsson
        $this->browse(function (Browser $browser) {
            $browser->loginAs(9);
            $browser->visit('/min-klass')                    
                    ->assertSee('nyklass')
                    ->screenshot('add_student')
                    ->press('Acceptera inbjudan')
                    ->pause(300)
                    ->screenshot('accepted_invitation')
                    ->assertSee('Du är en elev i klass: nyklass');

        });
        $this->assertDatabaseMissing('student_to_classes', ['student_id' => 9, 'class_id' => 2]); //Emil Gunnarsson
    }

    public function test_remove_class() {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(1);
            $browser->visit('/larare/skapa-elevkonto')
                    ->type('#class', 'tabortklass')
                    ->keys('#students', 'Elev tabort1, elevtabort1@usa.se, pwd12345', '{enter}','Elev tabort2, elevtabort2@usa.se, pwd12345', '{enter}')
                    ->press('Skapa konton')
                    ->pause(300)
                    ->screenshot('create_class')
                    ->assertSee('Följande användare är skapade i klass');
        });
        $this->assertDatabaseHas('teacher_classes', ['user_id' => 1, 'class' => 'tabortklass']);
        $this->assertDatabaseHas('student_classes', ['user_id' => 10, 'class_id' => 3]);
        
       $this->browse(function (Browser $browser) {
            $browser->loginAs(1);
            $browser->visit('/larare/ta-bort-konto')
                    ->screenshot('continue_delete')
                    ->select('class-selector', '0')
                    ->pause(300)
                    ->screenshot('continue_delete2')
                    ->assertSee('Elev tabort1, elevtabort1@usa.se')
                    ->assertSee('Elev tabort2, elevtabort2@usa.se')                    
                    ->press('Gå vidare med borttagning')
                    ->pause(300)
                    ->press('Ta bort')
                    ->pause(300);
        });
        $this->assertDatabaseMissing('teacher_classes', ['class' => 'tabortklass']);
        $this->assertDatabaseMissing('student_classes', ['class_id' => 3]);
        $this->assertDatabaseMissing('users', ['name' => 'Elev tabort1']);
        $this->assertDatabaseMissing('users', ['name' => 'Elev tabort1']);
        
    }

    public function test_solutions() {
        $user = User::factory()->create(['email' => 'solutions@pythonlabbet.se', 'password' => bcrypt('Access83'), 'is_teacher' => False]);  
        $this->browse(function (Browser $browser) {
            $user = DB::table('users')->where('email','solutions@pythonlabbet.se')->first();
            $browser->loginAs($user->id);
            $browser->visit('/grundkurs/skriva-ut')
                    ->keys('#monaco_editor-print_find textarea', ['{control}', 'a'], '{backspace}')
                    ->type('#monaco_editor-print_find textarea', 'print(\'Hej du!\')')
                    ->click('#run-print_find')
                    ->pause(300)
                    ->screenshot('hej_du')
                    ->assertSee('Rätt');        
        });
        $this->browse(function (Browser $browser) {
            $user = DB::table('users')->where('email','solutions@pythonlabbet.se')->first();
            $browser->logout();
            $browser->loginAs($user->id);
            $browser->visit('/grundkurs/skriva-ut')
                    ->keys('#monaco_editor-print_create textarea', ['{control}', 'a'], '{backspace}')
                    ->type('#monaco_editor-print_create textarea', 'print("Just nu är det år\n' . date("Y") . ' ")')
                    ->click('#run-print_create')
                    ->pause(300)
                    ->assertSee('Rätt');        
        });
        $this->browse(function (Browser $browser) {
            $user = DB::table('users')->where('email','solutions@pythonlabbet.se')->first();
            $browser->logout();
            $browser->loginAs($user->id);
            $browser->pause(100)->visit('/grundkurs/indata-med-input')->pause(100)
                    ->type('#monaco_editor-input-make textarea', 'Triangel')
                    ->click('#correct-input-make')
                    ->pause(300);
        });
        $this->browse(function (Browser $browser) {
            $user = DB::table('users')->where('email','solutions@pythonlabbet.se')->first();
            $browser->logout();
            $browser->loginAs($user->id);
            $browser->visit('/turtle/cirklar')
                    ->keys('#monaco_editor-turtle-circles-smiley textarea', ['{control}', 'a'], '{backspace}')
                    ->type('#monaco_editor-turtle-circles-smiley textarea', 'print("hej")')
                    ->click('#run-turtle-circles-smiley')
                    ->pause(300);
        });
        $this->browse(function (Browser $browser) {
            $browser->logout();
            $browser->loginAs(1);
            $browser->visit('/admin/update-solutions')
                        ->screenshot('update-solutions')
                        ->assertSee('Done.');
            $this->assertDatabaseHas('solutions', ['code_id' => 'print_create']);
            $this->assertDatabaseHas('solutions', ['code_id' => 'print_find']);
            $this->assertDatabaseHas('solutions', ['code_id' => 'input-make']);
            $this->assertDatabaseHas('solutions', ['code_id' => 'turtle-circles-smiley']);
        });
        
    }

    public function test_see_solutions() {
        DB::table('user_settings')->insert([
            'user_id' => 1,
            'easy_mode' => true,
            'show_solutions' => true,
            'show_videos' => false
        ]);
        $this->browse(function (Browser $browser) {
            $browser->loginAs(1);
            $browser->visit('/grundkurs/skriva-ut')
                        ->assertSee('Lösning')
                        ->press('Lösning');
            $browser->visit('/grundkurs/indata-med-input')
                        ->assertSee('Lösning');
            $browser->visit('/turtle/cirklar')
                        ->screenshot('solution')
                        ->assertSee('Lösning');
            
        });
    }
}
