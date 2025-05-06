<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User; // Make sure to import the User model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; // Import Str for generating random password

class SocialiteController extends Controller
{
    $user = User::create([
        'name' => $socialiteUser->getName() ?? $socialiteUser->getNickname(),
        'email' => $socialiteUser->getEmail(),
        'provider_id' => $socialiteUser->getId(),
        'provider_name' => $provider,
        'password' => \Hash::make(\Str::random(24)), // Generate a random password
    ]);
}