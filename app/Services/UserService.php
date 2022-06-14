<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Company;
use App\Models\CompanyAccount;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\UploadImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Observers\AccountObserver;

class UserService
{
    public $uploadImage;
    public function __construct(UploadImage $uploadImage)
    {
        $this->uploadImage = $uploadImage;
    }

    public function create($data)
    {
        if(!isset($data['password'])) {
            $data['password'] = Str::random(6);
        } 
        return User::create($data);
    }

    public function getById($id)
    {
        return User::findOrFail($id);
    }

    public function forgotPassword($email)
    {
        $token = Str::random(64);
        $rs = [
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ];
        DB::table('password_resets')->insert($rs);
        Mail::send('email.forget-password', ['token' => $token], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Reset Password');
        });
        return true;
    }

    public function login($data)
    {
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data)
    {
        $user = User::findOrFail(Auth::id());
        if (!empty($data['old_password']) && !empty($data['password'])) {
            if (!password_verify($data['old_password'], $user->password)) {
                return false;
            }
        } else {
            unset($data['old_password']);
            unset($data['password']);
            unset($data['password_confirmation']);
        }
        if (!empty($data['avatar'])) {
            $path = 'public/images/avatars';
            $data['avatar'] = $this->uploadImage->savefile($path, $data['avatar']);
            $user->avatar = $data['avatar'];
        }
        $user->update($data);
        return true;
    }

    public function createNewPassword($request)
    {
        $updatePassword = DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->token])->first();
        if (!$updatePassword) {
            return false;
        }
        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email' => $request->email])->delete();
        return true;
    }
    public function getAll($sortData){
        if(!empty($sortData)){
            return User::with('role')->orderBy($sortData['sort'], $sortData['direction'])->paginate(10);
        }
        return User::with('role')->paginate(10);
    }

    public function updateUser($id,$data){
        $user = User::findOrFail($id);
        $companyAccount = $user->companyAccount;
        if($data['company'] != 0){
            $checkCompany = false;
            if(count($companyAccount)){
                foreach($companyAccount as $item){
                    if($data['company'] == $item->company_id){
                        $checkCompany = true;
                    }
                }
                if(!$checkCompany){
                    CompanyAccount::create(['user_id' => $user->id, 'company_id' =>$data['company']]);
                }
            }
            else {
                CompanyAccount::create(['user_id' => $user->id, 'company_id' =>$data['company']]);
            }
        }
        unset($data['email']);
        if($user) {
            $user->update($data); 
            return true;  
        } else {
            return false;
        }
    }
}
