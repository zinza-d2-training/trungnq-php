<?php 
namespace App\Services;
use App\Repositories\UserRepository;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\User;
use App\Services\UploadImage;
use Illuminate\Support\Facades\Auth;
class UserService{

    public function create($data){
        $user = new User();
        $user->name = $data['name'];
        $user->dob  = $data['dob'];
        $user->email  = $data['email'];
        $user->avatar = $data['avatar'];
        $user->password = Hash::make($data['password']);
        $user->role = $data['role']; 
        $user->save(); 
        return $user->fresh();
    }
    public function getById($id){
        return User::where('id',$id)->first();
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
    public function login($data)
    {
        if(Auth::attempt([
            'email' =>$data['email'],
            'password' =>$data['password'],
            ])
        ) return true;
        else return false;
    }
    public function update($data){
        $user = User::where("id",Auth::id())->first();
        if(!empty($data['old-password']) && !empty($data['password']))
        {
            if (password_verify($data['old-password'], $user->password)) {
                $user->password = Hash::make($data['password']);
            } else {
                return [
                    'status' =>'false',
                    'message' => "Thay đôỉ thông tin tài khoản không thành công!!! Mật khẩu không chính xác!!!"
                ];
            }
        }
        if(!empty($data['avatar'])){
            $path = 'public/images/avatars';
            $file = $data['avatar'];
            $res = new UploadImage();
            $data['avatar'] = $res->savefile($path,$file);
            $user->avatar = $data['avatar'];
        }   
        $user->name = $data['name'];
        $user->dob = $data['dob'];
        $user->save();
        return [
            'status' =>'true',
            'message' => "Thay đôỉ thông tin tài khoản thành công!!!"
        ];

    }
}
