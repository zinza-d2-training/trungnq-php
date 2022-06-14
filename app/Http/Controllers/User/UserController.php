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
        return view('pages.user.create');
    }

    public function store(UserRequest $request)
    {
        $res = $this->userService->create($request->input());
        if ($res) {
            return response()->json([
                'status' => 'true',
                'type' => 'info',
                'message' => "Thay đôỉ thông tin tài khoản thành công!!!"
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'type' => 'warning',
                'message' => "Tạo tài khoản không thành công vui lòng kiểm tra lại!!!"
            ]);
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
            return response()->json([
                'type' => 'info',
                'message' => "Thay đôỉ thông tin tài khoản thành công!!!"
            ]);
        } else {
            return response()->json([
                'type' => 'warning',
                'message' => "Có lỗi trong quá trình thực hiện.Hãy thử lại"
            ]);
        }
    }

    public function destroy($id)
    {
        if (User::find($id)->delete()) {
            return response()->json([
                'type' => 'info',
                'message' => "Xóa tài khoản thành công!!!"
            ]);
        } else return response()->json([
            'type' => 'warning',
            'message' => "Có lỗi trong quá trình thực hiện.Hãy thử lại"
        ]);
    }
    public function destroyAll(Request $request)
    {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        User::whereIn('id', $ids)->delete();
        return response()->json([
            'type' => 'info',
            'message' => "Xóa tài khoản thành công!!!"
        ]);
    }
}
