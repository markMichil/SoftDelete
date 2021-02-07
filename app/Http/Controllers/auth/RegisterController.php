<?php

namespace App\Http\Controllers\auth;

use App\SocialProvider;
use App\User;
use Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class RegisterController extends Controller {

    function getRegister() {

        return view('auth.register');
    }

    function postRegister() {

        $data = request()->validate([
            'email' => 'required|unique:users,email|email',
            'first_name' => 'required|min:3|max:18|alpha',
            'last_name' => 'required|min:3|max:18|alpha',
            'password' => 'required|string|min:8|max:32|confirmed',
        ]);

        $user = Sentinel::registerAndActivate($data);
//        $role = Sentinel:: findRoleBySlug('user');
//
//        $role->users()->attach($user);


        return redirect()->route('login')->with('success', 'You are registered successfully');
    }
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {

   try{

            $user = Socialite::driver('facebook')->user();

            $socialProvider = SocialProvider::where('provider_id',$user->getId())->first();
            return     $user->token;

        }catch(\Exception $e)
        {
            
            return $e;

        }

    }
}
