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
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->middleware('auth:api', ['except' => ['postLogin']]);
    }

    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = JWTAuth::attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        } else {
            $user = User::where('email', $request->email)->firstOrFail();
            if ($user->active == User::isActive) {
                return response()->json(['type' => 'success', 'token' => $token], 200);
            } else {
                return response()->json(['type' => 'error', 'message' => 'InActive account'], 401);
            }
        }
    }

    public function checkToken()
    {
        return response()->json(['success' => true], 200);
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
        if ($result) {
            return back()->withInput()->with('message', 'Update password!!!');
        }
    }
}
