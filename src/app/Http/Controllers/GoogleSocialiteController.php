<?php
   
namespace App\Http\Controllers;
   
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
   
class GoogleSocialiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {
     
            $user = Socialite::driver('google')->stateless()->user();
      
            $finduser = User::where('email', $user->email)->first();
      
            if($finduser){
      
                Auth::login($finduser);
     
                return redirect('/');
      
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'social_type'=> 'google',
                    'password' => bcrypt('snSReJEuwBem7BKWM')
                ]);
     
                Auth::login($newUser);
      
                return redirect('/');
            }
     
        } catch (Exception $e) {
            report($e);
            dd('Tyvärr inträffade ett fel. Felet har rapporterats.');
        }
    }
}