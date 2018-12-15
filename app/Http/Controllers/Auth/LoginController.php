<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //los dos metodos siguientes fueron agregados para hacer login con el numero de cuenta o con email
    protected function credentials(Request $request)
        {
            $login = $request->input($this->username());

            // Comprobar si el input coincide con el formato de E-mail
            $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'cuenta';

            return [
                $field => $login,
                'password' => $request->input('password')
            ];
        }

        public function username()
        {
        return 'login';
        }
}
