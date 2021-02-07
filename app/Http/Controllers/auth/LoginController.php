<?php

namespace App\Http\Controllers\auth;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use App\SocialProvider;
use App\User;


class LoginController extends Controller {


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $provider = 'google';
        $password =  bcrypt($provider);
        try
        {

            $socialUser = Socialite::driver('google')->stateless()->user();
        }
        catch(\Exception $e)
        {
            return redirect('auth/google');
        }
        //check if we have logged provider
        $socialProvider = SocialProvider::where('provider_id',$socialUser->getId())->first();
        if(!$socialProvider)
        {
            //create a new user and provider
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => (strlen($socialUser->getEmail())>0)?$socialUser->getEmail():'',
                'password' => $password
            ]);



            $user->socialProvider()->create(
                [   'provider_id'   =>  $socialUser->getId(),
                    'provider'      =>  $provider,
                    'user_id'      =>  $user->id
                ]
            );
            $data = ['name'=>$user->name,'email' =>$user->email,'password'=>$provider];
            if (Auth::guard('user')->attempt($data)) {
                // Success redirect

                return Auth::guard('client')->user()->name;
            }else{
                return "Email Or Password Wrong with Google account";
            }
        }
        else{
            $user = $socialProvider->user;
            $data = ['email' =>$user->email,'password'=> $provider];
            if (Auth::user()->attempt($data)) {
                // Success redirect
                $cart = cart::where('client_id',Auth::guard('client')->user()->id)->count();
                return Auth::guard('client')->user()->name;
            }
            else {
                return "Email Or Password Wrong with Google account";

            }

        }

    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }




    public function handleFacebookCallback()
    {
        $provider = 'facebook';
        $password =  bcrypt($provider);
        try
        {
            $socialUser = Socialite::driver('facebook')->stateless()->user();
        }
        catch(\Exception $e)
        {
            return redirect('/');
        }
        //check if we have logged provider
        $socialProvider = SocialProvider::where('provider_id',$socialUser->getId())->first();
        if(!$socialProvider)
        {
            //create a new user and provider
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'password' => $password
            ]);



            $user->socialProvider()->create(
                [   'provider_id'   =>  $socialUser->getId(),
                    'provider'      =>  $provider,
                    'user_id'      =>  $user->id
                ]
            );
            $data = ['email' =>$user->email,'password'=>$provider];
            if (Auth::guard('user')->attempt($data)) {
                // Success redirect
                return Auth::guard('client')->user()->name;
            }
        }
        else{
            $user = $socialProvider->user;
            $data = ['email' =>$user->email,'password'=>$provider];
            if (Auth::guard('client')->attempt($data)) {
                // Success redirect
                return Auth::guard('client')->user()->name;
            }
            else {
                return "Email Or Password Wrong";

            }

        }

    }

}
