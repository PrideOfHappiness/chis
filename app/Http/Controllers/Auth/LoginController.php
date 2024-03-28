<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function login(Request $request){
        $data = $request->only(['kode_users', 'password']);
        $login = Auth::attempt(array('userName' => $data['kode_users'], 'password' => $data['password']));
        if(!$login){
            $login2 = Auth::attempt(array('email' => $data['kode_users'], 'password' => $data['password']));
            if($login){
                $user2 = Auth::user();
                if($user2->user_access == 3){
                    return redirect()->route('testHome');
                }else{
                    return redirect()->route('login')
                    ->with('error', 'Maaf, Data anda tidak terdaftar!');
                }
            }
        }else{
            $user = Auth::user();
                if($user->user_access == 3){
                    return redirect()->route('testHome');
                }else{
                    return redirect()->route('login')
                    ->with('error', 'Maaf, Data anda tidak terdaftar!');
                }
        }
    }
}
