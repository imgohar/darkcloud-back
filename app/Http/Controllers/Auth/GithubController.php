<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
  
class GithubController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('github')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
    
            // $user = Socialite::driver('github')->user();
            $user = Socialite::driver('github')->stateless()->user();
            
            $finduser = User::where('github_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/');
     
            }else{
                if($us = User::where('email',$user->email)->first()){
                    Auth::login($us);
                    return redirect('/');
                }

                // return $user->name;
                $newUser = User::create([
                    'fname' => $user->nickname,
                    'email' => $user->email,
                    'github_id'=> $user->id,
                    'password' => encrypt('123456dummy'),
                    'email_verified_at' => now(),
                ]);
                $newUser->markEmailAsVerified();
                    
                Auth::login($newUser);
                return redirect('/');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}