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
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Tymon\JWTAuth\Facades\JWTAuth;

use function App\Http\Helpers\responseError;
use function App\Http\Helpers\responseSuccess;

class AuthenController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->middleware(['auth:api'], ['except' => ['postLogin']]);
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
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->active == User::isActive) {
                $token = JWTAuth::attempt($validator->validated());
                $user = User::with("role")->findOrFail(Auth::id());

                return response()->json(['type' => 'success', 'token' => $token, 'user' => $user], 200);
            } else {
                return response()->json(['type' => 'error', 'message' => "Account InActive"], 200);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function checkToken()
    {
        return response()->json(['success' => true], 200);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['success' => true], 200);
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
        return responseSuccess($data, "", 200);
    }

    public function update(UserRequest $request)
    {
        $input = $request->all();
        $response = $this->userService->update($input);
        if (!$response) {
            return responseError("Thay đôỉ thông tin tài khoản không thành công!!! Mật khẩu không chính xác!!!", 400);
        }
        return responseSuccess(null, "Thay đôỉ thông tin tài khoản thành công!!!", 200);
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
