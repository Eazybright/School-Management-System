<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $username = 'username';
    protected $password = 'password';
    protected $redirectTo = '/dashboard';
    protected $guard = 'web';
    public $table = 'users';

    public function getLogin()
    {
        if(Auth::guard('web')->check())
        {
            return redirect()->route('dashboard');
        }
        return view('pages/login');
    }

    public function postLogin(Request $request)
    {
        $auth = Auth::attempt([
                'username' => $request->username,
                'password' => $request->password,
                'active' => 1,
            ]);
        if($auth)
        {
            return redirect()->route('dashboard');
        }
        return redirect()->route('/'); 
    }

    public function getLogout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('/');
    }
}
