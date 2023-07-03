<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\TeacherClass;
use App\Models\StudentClass;
use App\Models\ClassSetting;
use App\Models\UserSettings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Mail;

class CreateAccounts extends Component
{
    public $text = '';
    public $error_text = '';
    public $sent = false;
    public $class = '';
    public $school = '';
    public $selectedClass = '';
    public $classes = array();
    public $students = array();
    public $new_users = array();

    public function mount() {
        $this->classes = TeacherClass::where('user_id', Auth::id())->pluck('class')->toArray();
        //$this->classes = array(1,2,3,4,5);
    }

    public function createNew() {
        $this->error_text = "";
        if($this->class == '') {
            $this->error_text = "Fyll i klassnamn";
            return;
        }
        $this->class = preg_replace('/\s+/', '', str_replace('/', '-', $this->class));
        $this->new_users = array();
        $this->students = preg_split("/\\r\\n|\\r|\\n/", $this->text);
        //check all
        $row = 1;
        $school = $this->school;
        $school = str_replace("å", "a", $school);
        $school = str_replace("ä", "a", $school);
        $school = str_replace("ö", "o", $school);
        $school = preg_replace("/[^a-zA-Z0-9]+/", "", $school);
        $school = strtolower($school);
        if(empty($this->text)) {
            $this->error_text = "Skriv in användare i textrutan enligt instruktion.";
            return;
        }
        foreach($this->students as $student) {
            if(!$student) continue; //empty row?
            $explode = explode(",", $student);
            $count = count($explode);
            if($count < 1 || $count > 3 ) {
                $this->error_text = "Fel syntax på rad" . $row . ": " . $student;
                return;
            }
            if($count == 1 && $school == '') {
                $this->error_text = "Skolnamn är obligatoriskt om e-postadresser ska genereras.";
                return;
            }
            $name = $explode[0];
            if( strpos($name, '@') !== false ) {  //check if @ is in name
                $this->error_text = "Namnet ska inte innehålla @ på rad " . $row . ": " . $student;
                return;
            }
            if(strlen($name) < 2 || strlen($name) > 45) {
                $this->error_text = "Fel på namn på rad " . $row . ": " . $student;
                return;
            }
            if($count >= 2) {
                $email = trim($explode[1]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $this->error_text = "Fel på e-post på rad " . $row . ": " . $student;
                    return;
                }
                if($count == 3) {
                    $pwd = trim($explode[2]);
                    if(strlen($pwd) < 3) {
                        $this->error_text = "För få tecken i lösenordet på rad " . $row . ": " . $student;
                        return;
                    }
                    if(preg_match('/\s/',$pwd)) {
                        $this->error_text = "Lösenordet innehåller felaktiga tecken på rad " . $row . ": " . $student;
                        return;
                    }
                }
            }
            
            $row += 1;
        }

        $all_emails = array();
        foreach($this->students as $student) {
            $explode = explode(",", $student);
            $count = count($explode);
            $name = trim($explode[0]);
            if($name == '') continue;
            $email = '';
            $pwd = '';
            if($count >= 2) {
                $email = trim($explode[1]);
            }
            else { //generate email
                $name_corrected = str_replace(" ", ".", $name );
                $name_corrected = str_replace(array("Ö", "ö"), "o", $name_corrected);
                $name_corrected = str_replace(array('Å', 'Ä', 'å', 'ä'), "a", $name_corrected);
                $name_corrected = preg_replace('/[^A-Za-z0-9\-\.]/', '', $name_corrected);
                $email = strtolower($name_corrected) . '@' . $school . '.pythonlabbet.se';
            }
            //check email
            if(User::where('email', $email)->first() != null) {
                $this->error_text = "E-post " . $email . " finns redan i systemet.";
                return;
            }
            if(in_array($email, $all_emails)) {
                $this->error_text = "E-post " . $email . " blir en dubblett. Varje e-post måste vara unik.";
                return;
            }
            else {
                array_push($all_emails, $email);
            }

            if($count == 3) {
                $pwd = trim($explode[2]);
            }
            else { //generate password
                $consonants = array('b','c','d','f','g','h','j','k','l','m','n','p','r','s','t','v','x');
                $vowels = array('a', 'e', 'i', 'o', 'u', 'y');
                $c_picks = array_rand($consonants, 3);
                $v_picks = array_rand($vowels, 2);
                $pwd = $consonants[$c_picks[0]] . $vowels[$v_picks[0]] . $consonants[$c_picks[1]] . $vowels[$v_picks[1]] . $consonants[$c_picks[2]];
            }

            array_push($this->new_users, array($name, $email, $pwd));
        }

        //create TeacherClass
        if(in_array($this->class, $this->classes)) {
            $teacherClass = TeacherClass::where('user_id', Auth::id())->where('class', $this->class)->first();
        }
        else {
            $teacherClass = new TeacherClass;
            $teacherClass->user_id = Auth::id();
            $teacherClass->class = $this->class;
            $teacherClass->save();
        }

        

        //create users
        $class_settings = ClassSetting::where('class_id',$teacherClass->id)->first();
        Log::debug($class_settings);
        foreach($this->new_users as $new_user) {
            try {
                $user = new User;
                $user->name = $new_user[0];
                $user->email = $new_user[1];
                $user->password = Hash::make($new_user[2]);
                $user->save();

                $studentClass = new StudentClass;
                $studentClass->user_id = $user->id;
                $studentClass->class_id = $teacherClass->id;
                $studentClass->save();

                if($class_settings) {
                    $user_settings = new UserSettings;
                    $user_settings->user_id = $user->id;
                    if($class_settings->show_videos !== null)
                        $user_settings->show_videos = $class_settings->show_videos;
                    if($class_settings->show_solutions !== null)
                        $user_settings->show_solutions = $class_settings->show_solutions;
                    if($class_settings->easy_mode !== null)
                        $user_settings->easy_mode = $class_settings->easy_mode;

                    $user_settings->save();
                }
            } catch(Throwable $e) {
                report($e);
                $this->error_text = "Fel vid skapandet av användare med e-post: " . $new_user[1] . ".";
                Log::error($this->new_users); //Todo: notify admin!
                return;
            }
        }
        
        

        $this->sent = true;
    }

    public function updatedSelectedClass($value) {
        if($this->selectedClass != '') {
            $this->class = $this->selectedClass;
        }
    }

    public function render()
    {
        return view('livewire.create-accounts');
    }
}
