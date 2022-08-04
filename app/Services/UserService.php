<?php

namespace App\Services;

use App\Events\CreateUser;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\UploadImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Observers\AccountObserver;
use Illuminate\Support\Facades\Config;

class UserService
{
    public $uploadImage;
    public function __construct(UploadImage $uploadImage)
    {
        $this->uploadImage = $uploadImage;
    }

    public function create($data)
    {
        if (!isset($data['password'])) {
            $data['password'] = Str::random(6);
        }
        $email = $data['email'];
        $user = User::create($data);
        if ($data['company'] != 0) {
            $user->company()->attach($data['company']);
        }
        event(new CreateUser($user, $email));
        return $user;
    }

    public function getById($id)
    {
        return User::with(['company', 'role'])->findOrFail($id);
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
        if (!empty($data['avatar']) && is_file($data['avatar'])) {
            $data['avatar'] = $this->uploadImage->savefile($data['avatar']);
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
        $user = User::where('email', $request->email);
        $data['password'] = Hash::make($request->password);
        $user->update($data);
        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return true;
    }

    public function getAll($sortData)
    {
        $query = User::with('role');
        if (!empty($sortData)) {
            $query = $query->orderBy($sortData['sort'], $sortData['direction']);
        }

        return $query->paginate(Config::get('constants.paginate'));
    }

    public function updateUser($id, $data)
    {
        $user = User::with('role')->findOrFail($id);
        if ($user->role->name == "admin" && Auth::user()->role->name != "admin") {
            return false;
        }
        $company = $user->company;
        $user->company()->detach();

        if (!empty($company) && $data['company']) {
            $company = Company::withCount('user')->findOrFail($data['company']);
            if ($company->max_users > $company->user_count) {
                $user->company()->attach($data['company']);
            } else {
                return false;
            }
        } else {
            $user->company()->detach();
        }

        if (Auth::user()->role->name != 'admin') {
            unset($data['email']);
        }
        $user->update($data);

        return true;
    }
}
