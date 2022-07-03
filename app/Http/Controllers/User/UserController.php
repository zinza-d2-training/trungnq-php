<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Models\User;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $users = $this->userService->getAll($request->input());

        return view('pages.user.index', ['users' => $users]);
    }

    public function create()
    {
        $companys = Company::all();

        return view('pages.user.create', compact('companys'));
    }

    public function store(UserRequest $request)
    {
        $res = $this->userService->create($request->input());

        if ($res) {
            return back()->with('message', ['type' => 'success', 'content' => 'Tạo tài khoản thành công!!!']);
        } else {
            return back()->with('message', ['warning' => 'success', 'content' => 'Có lỗi khi thực hiện vui long kiểm tra lại!!!']);
        }
    }
    public function show($id)
    {
    }

    public function edit($id)
    {
        return view('pages.user.edit', ['user' => $this->userService->getById($id), 'companyList' => Company::all()]);
    }

    public function update(UserRequest $request, $id)
    {
        $res = $this->userService->updateUser($id, $request->input());
        if ($res) {
            return $this->message('info', 'Thay đổi thông tin tài khoản thành công!!!');
        } else {
            return $this->message('danger', 'Thất bại. Công ty đã full thành viên!!! ');
        }
    }

    public function destroy($id)
    {
        $user = User::with('role')->find($id);
        if ($user->role->name != 'admin') {
            $user->comments()->delete();
            $user->post()->delete();
            $user->post()->delete();
            $user->comment_like()->delete();
            return $this->message('info', 'Xóa tài khoản thành công');
        } else {
            return $this->message('danger', 'Không thể xóa admin');
        }
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $a = User::whereIn('id', $ids)->with('role')->get();
        foreach ($a as $user) {
            if ($user->role->name == "admin") {
                return $this->message('danger', 'Không thể xóa admin');
            } else {
                $user->comments()->delete();
                $user->post()->delete();
                $user->comment_like()->delete();
                $user->delete();
            }
        }
        return $this->message('info', 'Xóa tài khoản thành công!!!');
    }

    public function message($type, $message)
    {
        return response()->json(['type' => $type, 'message' => $message]);
    }

    public function error()
    {
        return response()->json(['type' => 'danger', 'message' => 'Có lỗi trong quá trình thực hiện.Hãy thử lại']);
    }
}
