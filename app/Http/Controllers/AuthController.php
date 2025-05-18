<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;    
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;
class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register()
    {
        return view('register');
    }

    public function post_register(RegisterRequest $request)
    {
        $this->authService->registerUser($request->validated());

        return redirect('/dang-nhap')->with('success_register', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }

    public function login()
    {
        return view('login');
    }

    public function post_login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success_login', 'Đăng nhập thành công!');
        }

        return back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác.']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success_logout', 'Đăng xuất thành công!');
    }

   public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
       
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect()->back()->with('success_login', 'Đăng nhập thành công!');
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('google_password')
                ]);
      
                Auth::login($newUser);
      
                return redirect()->back()->with('success_login', 'Đăng nhập thành công!');
            }
      
        } catch (Exception $e) {
            Log::info($e->getMessage());
        }
    }
}