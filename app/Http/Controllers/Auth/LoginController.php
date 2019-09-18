<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;


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
    public function logout(Request $request) {
         Auth::logout();
        return redirect('login');
    }

    protected function credentials(Request $request)
    {
        Log::info('Request = ' . $request);

        $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
            ? $this->username()
            : 'username';

        Log::info('Field = ' . $field);

        return [
            $field => $request->get($this->username()),
            'password' => $request->password,
            
        ];
        
    }
    // protected function validateLogin(Request $request)
    // {
    // $this->validate($request, [
    //     $this->username() => 'required|exists:users,' . $this->username() . ',aktif,1',
    //     'password' => 'required',
    //     'level'=>'required',
    // ], [
    //     $this->username() . '.exists' => 'The selected user is invalid or the account has been disabled.'
    // ]);
    // }
    public function authenticated(Request $request, $user)
    {

        if (!$user->aktif==1) {
            auth()->logout();
            Alert::warning('Oopss..', 'Mohon Maaf Akun Anda Belum Aktif, Mohon Menunggu atau hubungi admin.');
            return back();
        }
         toast('You have successfully logged in !!!','success');
         return redirect()->intended($this->redirectPath());
    }
    
    
    
}
