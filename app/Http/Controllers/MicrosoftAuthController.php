<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class MicrosoftAuthController extends Controller
{
    /**
     * Redirect the user to the Microsoft authentication page.
     */
    public function redirect()
    {
        // We can request specific "scopes" from Microsoft
        // 'openid', 'profile', and 'email' are common ones
        return Socialite::driver('microsoft')
            ->scopes(['openid', 'profile', 'email'])
            ->redirect();
    }

    /**
     * Obtain the user information from Microsoft.
     */
    public function callback()
    {
        // Get the user details from Microsoft
        $microsoftUser = Socialite::driver('microsoft')->user();

        // Find or create a local user
        $user = User::updateOrCreate(
            [
                'microsoft_id' => $microsoftUser->getId(), // Find by their Microsoft ID
            ],
            [
                'name' => $microsoftUser->getName(),
                'email' => $microsoftUser->getEmail(),
                'avatar' => $microsoftUser->getAvatar(),
                'password' => Hash::make(str()->random(24)) // Set a random password
            ]
        );

        // Log the user in
        Auth::login($user);

        // Redirect them to the dashboard
        return redirect()->route('dashboard');
    }

    /**
     * Log the user out.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
