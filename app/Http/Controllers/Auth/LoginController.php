<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($driver)
    {
      return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver)
    {
      $user = Socialite::driver($driver)->user();
      $authUser = $this->findOrCreateUser($user, $driver);
      Auth::login($authUser, true);
      return redirect()->to('/');
    }

    public function findOrCreateUser($user, $driver)
    {
        //patikrinam ar useris yra duomenu bazeje jei nera sukuriam
        //sql where (email = user->email)
        //first grazina pirma rasta irasa
        // dd($driver);
        $authUser = User::where([
          ['email', '=', $user->email],
          ])->first();

        if ($authUser) {
          if ($authUser->provider != $driver) {
            $authUser->provider = $driver;
            if ($driver == 'github') {
              $authUser->name = $user->nickname;
            } else if ($driver == 'facebook') {
              $authUser->name = $user->name;
            }
          }

          $authUser->update();
          return $authUser;
        }
        $newUser = new User();

        if ($driver == 'github') {
          $newUser->name = $user->nickname;
        } else if ($driver == 'facebook'){
          $newUser->name = $user->name;
        }

        $newUser->email = $user->email;
        $newUser->provider = $driver;
        $newUser->provider_id = $user->id;
        $newUser->save();
        return $newUser;
    }
}
