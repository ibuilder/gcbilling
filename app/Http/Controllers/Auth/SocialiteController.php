<?php

namespace App\Http\Controllers\Auth;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; // Import Str for generating random password
use Illuminate\Support\Facades\Hash;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the social provider authentication page.
     * 
     * @param string $provider
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the social provider.
     * 
     * @param string $provider
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(string $provider)
    {
        if ($provider === 'office365') {
            $provider = 'azure'; // Use the azure provider for Office 365
        }

        $socialiteUser = Socialite::driver($provider)->user();
        
        // Check if a user with the same provider_id and provider_name exists
        $user = User::where('provider_id', $socialiteUser->getId())
                     ->where('provider_name', $provider)
                     ->first();

        // If user does not exists with the provider_id and provider_name
        if(!$user){
            //check if a user exists with the email address
            $user = User::where('email', $socialiteUser->getEmail())->first();
            if($user){
                 if($user->provider_id == null){
                     $user->provider_id = $socialiteUser->getId();
                     $user->provider_name = $provider;
                     $user->save();
                 } else {
                     throw new Exception("Account with that email exists, but is linked to different provider.", 1);
                 }
            }else {
                 //if there is no user with the email address, create the new user.
                 $user = User::create([
                    'name' => $socialiteUser->getName() ?? $socialiteUser->getNickname(),
                    'email' => $socialiteUser->getEmail(),
                    'provider_id' => $socialiteUser->getId(),
                    'provider_name' => $provider,
                    'password' => Hash::make(Str::random(24)), 
                 ]);
            }
        }
      
        //Login the user.
        Auth::login($user, true);
      
        //Redirect to dashboard
        return redirect('/dashboard');
    }
}