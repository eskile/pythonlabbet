<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class ProblemTest extends DuskTestCase
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
            $user = User::factory()->create(['email' => 'emil@usa.se', 'password' => bcrypt('Access83'), 'is_teacher' => True]);
            $user = User::factory()->create(['name' => 'The Teacher', 'is_teacher' => True]);
            $user = User::factory()->create(['name' => 'The Pupil']);
            self::$migration_run = True;
        }
    }

    public function test_euler_biggest_factor()
    {
        //Wrong answer as guest
        $this->browse(function (Browser $browser) {
            $browser->logout();
            $browser->visit('/problemlosning/storsta-primfaktor')
                    ->screenshot('problem-euler')
                   ->type('#monaco_editor-problem\.euler-largest-prime-factor textarea', 'print("FEL")')
                    ->click('#correct-problem\.euler-largest-prime-factor')
                    ->pause(300)
                    ->assertDontSee('Rätt!');
        });
        //Correct answer as guest
        $this->browse(function (Browser $browser) {
            $browser->visit('/problemlosning/storsta-primfaktor')
                    ->type('#monaco_editor-problem\.euler-largest-prime-factor textarea', 'print("6857")')
                    ->click('#correct-problem\.euler-largest-prime-factor')
                    ->pause(300)
                    ->assertSee('Rätt!');
        });

        //Correct answer as user
        $this->browse(function (Browser $browser) {
            $browser->loginAs(3);
            $browser->visit('/problemlosning/storsta-primfaktor')
                    ->type('#monaco_editor-problem\.euler-largest-prime-factor textarea', 'print("6857")')
                    ->click('#correct-problem\.euler-largest-prime-factor')
                    ->pause(300)
                    ->assertSee('Rätt!');
        });
        $this->assertDatabaseHas('solved_problems', ['user_id' => 3, 'problem' => e('problem.euler-largest-prime-factor'),'solved' => 1]);

        //Wrong answer as user (after solved once)
        $this->browse(function (Browser $browser) {
            $browser->loginAs(3);
            $browser->visit('/problemlosning/storsta-primfaktor')
                    ->type('#monaco_editor-problem\.euler-largest-prime-factor textarea', 'print("FEL")')
                    ->click('#correct-problem\.euler-largest-prime-factor')
                    ->pause(300)
                    ->assertDontSee('Rätt!');
        });
        $this->assertDatabaseHas('solved_problems', ['user_id' => 3, 'problem' => e('problem.euler-largest-prime-factor'),'solved' => 1]);
        
    }
}
