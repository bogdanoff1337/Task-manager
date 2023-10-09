<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{

    public function getUserName()
    {
        // Перевірка, чи користувач аутентифікований
        if (Auth::check()) {
            $userName = Auth::user()->name;
            return response()->json(['userName' => $userName, 'isLoggedIn' => true]);
        } else {
            return response()->json(['userName' => '', 'isLoggedIn' => false]);
        }
    }


    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $authUser = User::where('email', $user->email)->first();

        if ($authUser) {
            Auth::login($authUser);
            return redirect('/');
        } else {
            $user = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'provider' => 'google',
                'provider_id' => $user->id,
            ]);

            Auth::login($user);
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout(); 
        return redirect('/'); 
    }
}
