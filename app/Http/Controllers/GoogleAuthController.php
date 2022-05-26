<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request; 
use App\Model\Admin\Setting\Module;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    } 
    
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();  
            $user = User::where('email',$googleUser->email)->first() ?? false;
            if($user){
                if(Auth::loginUsingId($user->id)){   
                    return redirect()->route('home');
                }
            }else{
                $newUser = User::create([
                                    'name' => $googleUser->name,
                                    'email' => $googleUser->email,
                                    'google_id'=> $googleUser->id,
                                    'password' => encrypt('123456dummy')
                                ]);

                Auth::login($newUser);
                return redirect()->route('home');
           }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    } 
}
