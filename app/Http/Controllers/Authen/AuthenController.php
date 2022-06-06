<?php

namespace App\Http\Controllers\Authen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Nette\Utils\Random;
use Illuminate\Support\Facades\Mail;
use App\Services\UserService;

class AuthenController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /*view login */
    public function login(){
        return view("authen.login",[
            "title" => "Login"
        ]);
    }

    /* hander login*/
    public function postLogin(LoginRequest $request )
    {
        $data = $request->only([
            'email',
            'password'
        ]);
        if($this->userService->login($data)){
            return redirect()->route('home');
        }
        else {
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
        return view('authen.resetpassword',[
            "title" => "Quên mật khẩu"
        ]);
    }

    public function sendPass(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $data = $this->userService->forgotPassword($request->email);
        return back()->with( $data);
    }

    public function edit()
    {
        $data = $this->userService->getById(Auth::id());
        return view('pages.account',['title' =>'Accoutn','user' =>$data]);
    }

    public function update(UserRequest $request)
    {
        
        $input = $request->all();
        $response= $this->userService->update($input);
        return response()->json($response);
    }

    public function create()
    {
        $data = [
            'name' =>'test',
            'email' =>'trungnq@gmail.com',
            'dob' =>'2000/7/21',
            'avatar' =>'test',
            'password' =>'test',
            'role' => '1'
        ];
        $this->userService->create($data);
        dd($data);
    }
}
