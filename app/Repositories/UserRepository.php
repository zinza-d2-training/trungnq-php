<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class UserRepository {
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function new($data){
        $user = new $this->user;
        $user->name = $data['name'];
        $user->dob  = $data['dob'];
        $user->avatar = $data['avatar'];
        $user->password = Hash::make($data['password']);
        $user->role = $data['role']; 
        $user->save(); 
        return $user->fresh();
    }
    public function getById($id){
        return $this->user->where('id',$id)->first();
    }

    public function forgotPassword($email){
        $user = User::where('email',$email)->first();
        if($user){
            $new_pass = rand(100000,999999);
            $mailData = [
                "email" =>$user->email,
                "password" => $new_pass
            ];
            Mail::to($user->email)->send(new SendMail($mailData));
            $user->password = Hash::make($new_pass);
            $user->save();
            return $res = ['msg' => 'Mật khẩu mới đã được gửi tới email của bạn, vui lòng kiểm tra và đăng nhập lại.'];
        }
        else  return $res = ['error' => 'Email bạn nhập không chính xác'];
    }
    public function login($data){
        if(Auth::attempt([
            'email' =>$data['email'],
            'password' =>$data['password'],
            ])
        ) return true;
        else return false;
    }
}

?>