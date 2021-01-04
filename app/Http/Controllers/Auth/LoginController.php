<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SendNumberRequest;
use App\Models\Code;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(LoginRequest $request)
    {
        $result = checkVerificationCode($request->code, $request->phone_number);
        if ($result['status'] == '0') {
            $user = User::query()->where('phone_number', $request->phone_number)->first();
            $flag = 0;
            if ($user) {
                ($user->group_id == "" || $user->group_id == null) ? $flag = 0 : $flag = 1;
                Auth::login($user);
            } else {
                $user = User::query()->create([
                    'phone_number'=>$request->get('phone_number')
                ]);

                Auth::login($user);
            }

            return redirect()->route('home');
        } else {
            return redirect()->route('loginForm');
        }
    }


    public function sendNumber(SendNumberRequest $request)
    {
        $code = generateRandomNumber(4);

        Code::createNew($code, $request->phone_number);

        sendSms($request->phone_number, $code);

       session()->flash('flash_message', ' کد عضویت به شماره شما ارسال گردید');

        return view('auth.sendCode');

    }
}
