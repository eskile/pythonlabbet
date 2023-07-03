<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class BasicCourseTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    static private $migration_run = False;

    public function setUp() : void {
        parent::setUp();
        if(!self::$migration_run) {
            $this->artisan('migrate:fresh');
            $this->artisan('command:seed');
            $user = User::factory()->create(['email' => 'emil@usa.se', 'password' => bcrypt('Access83'), 'is_teacher' => True]);
            $user = User::factory()->create(['name' => 'The Teacher', 'is_teacher' => True]);
            $user = User::factory()->create(['name' => 'The Pupil']);
            DB::table('user_settings')->insert([
                'user_id' => $user->id,
                'easy_mode' => true,
                'show_solutions' => true,
                'show_videos' => false
            ]);
            self::$migration_run = True;
        }
    }

    public function test_all_basic_pages() {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(3); //The Pupil
            $browser->visit('/grundkurs/introduktion')
                    ->assertSee('Introduktion');
            $browser->visit('/grundkurs/skriva-ut')
                    ->assertSee('Funktionen print');
            $browser->visit('/grundkurs/enkla-berakningar')
                    ->assertSee('Enkla beräkningar');
            $browser->visit('/grundkurs/variabler-och-datatyper')
                    ->assertSee('Variabler och datatyper');
            $browser->visit('/grundkurs/indata-med-input')
                    ->assertSee('Indata från användaren');
            $browser->visit('/grundkurs/logiska-uttryck')
                    ->assertSee('Logiska uttryck');
            $browser->visit('/grundkurs/if-satsen')
                    ->assertSee('if-satsen');
            $browser->visit('/grundkurs/while-satsen')
                    ->assertSee('while-satsen');
            $browser->visit('/grundkurs/slumptal')
                    ->assertSee('Slumptal');
        });
    }

    public function test_into_indent_gives_correct()
    {   
        $this->browse(function (Browser $browser) {
            $browser->visit('/grundkurs/introduktion')
                    ->keys('#monaco_editor-intro_indent textarea', ['{control}', 'a'], '{backspace}')
                    ->type('#monaco_editor-intro_indent textarea', 'print("0\n1\n2")')
                    ->click('#run-intro_indent')
                    ->pause(300)
                    //->screenshot('test');
                    ->assertSee('Rätt!');
        });
    }

    public function test_intro_comment_gives_correct()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/grundkurs/introduktion')
                    //->pause(100)
                    ->keys('#monaco_editor-intro_comment textarea', ['{control}', 'a'], '{backspace}')
                    ->type('#monaco_editor-intro_comment textarea', 'print("...")')
                    ->click('#run-intro_comment')
                    ->pause(300)
                    //->screenshot('intro_comment')
                    ->assertSee('Rätt!');
        });
    }

    public function test_into_indent_saves_for_pupil()
    {   
        $this->browse(function (Browser $browser) {
            $browser->loginAs(3);
            $browser->visit('/grundkurs/introduktion')
                    ->keys('#monaco_editor-intro_indent textarea', ['{control}', 'a'], '{backspace}')
                    ->type('#monaco_editor-intro_indent textarea', 'print("0\n1\n2")')
                    ->click('#run-intro_indent')
                    ->pause(300)
                    ->assertSee('Rätt!')
                    ->logout();
        });
        $this->assertDatabaseHas('saves', ['user_id' => 3, 'code_id' => 'intro_indent']);
        $this->assertDatabaseHas('tasks', ['user_id' => 3, 'code_id' => 'intro_indent', 'completed' => 1]);
    }

    public function test_intro_completed_logged_in()
    {
        
        $this->browse(function (Browser $browser) {
            $browser->loginAs(3);

            $browser->visit('/grundkurs/introduktion')
                    ->keys('#monaco_editor-intro_indent textarea', ['{control}', 'a'], '{backspace}')
                    ->type('#monaco_editor-intro_indent textarea', 'print("0\n1\n2")')
                    ->click('#run-intro_indent')
                    ->pause(300)
                    ->assertDontSee('Du har klarat alla(');

            $browser->visit('/grundkurs/introduktion')
                    ->keys('#monaco_editor-intro_comment textarea', ['{control}', 'a'], '{backspace}')
                    ->type('#monaco_editor-intro_comment textarea', 'print("...")')
                    ->click('#run-intro_comment')
                    ->pause(300)
                    ->screenshot('du_har_klarat_alla')
                    ->assertSee('Du har klarat alla (')
                    ->logout();
                    
        });
    }

    public function test_print_predict() {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(3);
            $browser->visit('/grundkurs/skriva-ut')
            ->click('#option-print_predict-1')
            ->pause(300)
            ->click('#run-print_predict')
            ->pause(300)
            ->assertSee('Rätt')
            ->logout();

        });
        $this->assertDatabaseHas('answers', ['user_id' => 3, 'code_id' => 'print_predict', 'answer' => 2, 'solved' => 1]);

    }

    public function test_print_create() {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(3);
            $browser->visit('/grundkurs/skriva-ut')
                    ->type('#monaco_editor-print_create textarea', 'print("Just nu är det år\n' . date("Y") . ' ")')
                    ->click('#run-print_create')
                    ->pause(300)
                    ->assertSee('Rätt')
                    ->logout();
        });
        $this->assertDatabaseHas('saves', ['user_id' => 3, 'code_id' => 'print_create']);
        $this->assertDatabaseHas('tasks', ['user_id' => 3, 'code_id' => 'print_create', 'completed' => 1]);

    }

    public function test_random_modify_correct() {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(3);
            $browser->visit('/grundkurs/slumptal')
                    ->keys('#monaco_editor-random-make textarea', ['{control}', 'a'], '{backspace}')
                    ->type('#monaco_editor-random-make textarea', 'import random')
                    ->keys('#monaco_editor-random-make textarea', '{enter}')
                    ->type('#monaco_editor-random-make textarea', 'print(random.randint(1,6) + random.randint(1,6))')
                    ->click('#run-random-make')
                    ->pause(500)
                    ->click('#correct-random-make')
                    ->pause(500)
                    ->assertSee('Rätt')
                    ->logout();
        });
        $this->assertDatabaseHas('saves', ['user_id' => 3, 'code_id' => 'random-make']);
        $this->assertDatabaseHas('tasks', ['user_id' => 3, 'code_id' => 'random-make', 'completed' => 1]);

    }

    public function test_random_modify_correct_logged_out() {
        $this->browse(function (Browser $browser) {
            $browser->visit('/grundkurs/slumptal')
                    ->keys('#monaco_editor-random-make textarea', ['{control}', 'a'], '{backspace}')
                    ->type('#monaco_editor-random-make textarea', 'import random')
                    ->keys('#monaco_editor-random-make textarea', '{enter}')
                    ->type('#monaco_editor-random-make textarea', 'print(random.randint(1,6) + random.randint(1,6))')
                    ->click('#run-random-make')
                    ->pause(500)
                    ->click('#correct-random-make')
                    ->pause(500)
                    ->assertSee('Rätt');
        });
    }
}
