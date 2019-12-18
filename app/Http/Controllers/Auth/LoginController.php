<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @return RedirectResponse
     */
    public function redirectToProvider()
    {

        return Socialite::with('graph')->redirect();

    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('graph')->user();

        $name  = $user['displayName'];
        $email = $user['userPrincipalName'];
        $id    = $user['id'];

        // check if they're an existing user
        $existingUser = User::where('email', $email)->first();

        if ($existingUser) {
            auth()->login($existingUser, true);

        } else {
            // create a new user
            $User           = new User;
            $User->name     = $name;
            $User->email    = $email;
            $User->password = $id;
            $User->save();
            auth()->login($User, true);
        }

        return redirect()->to('/home');
    }


}
