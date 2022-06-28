<?php

namespace App\Http\Controllers\Authen;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;

class AuthenController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        return view("authen.login");
    }

    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        } else {
            session()->flash('error', 'Email hoặc mật khẩu không chính xác');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('custom-login');
    }

    public function resetPass()
    {
        return view('authen.resetpassword', [
            "title" => "Quên mật khẩu"
        ]);
    }

    public function sendPass(EmailRequest $request)
    {
        $data = $this->userService->forgotPassword($request->email);
        if ($data) {
            return back()->with('message', 'We have e-mailed your password reset link!');
        }
        return back()->with('error', "Error");
    }

    public function edit()
    {
        $data = $this->userService->getById(Auth::id());
        return view('pages.account', ['user' => $data]);
    }

    public function update(UserRequest $request)
    {
        $input = $request->all();
        $response = $this->userService->update($input);
        if (!$response) {
            return response()->json([
                'status' => 'false',
                'message' => "Thay đôỉ thông tin tài khoản không thành công!!! Mật khẩu không chính xác!!!",
                'type' => 'danger'
            ]);
        }
        return response()->json([
            'status' => 'true',
            'type' => 'success',
            'message' => "Thay đôỉ thông tin tài khoản thành công!!!"
        ]);
    }

    public function showResetPasswordForm($token)
    {
        return view('authen.new-password', ['token' => $token]);
    }

    public function submitResetPasswordForm(PasswordRequest $request)
    {
        $result = $this->userService->createNewPassword($request);
        if($result){
            return back()->withInput()->with('message', 'Update password!!!');
        }
    }
}
