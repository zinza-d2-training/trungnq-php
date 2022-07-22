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

        return response()->json(['success' => true, 'data' => $users], 200);
    }

    public function create()
    {
        $companys = Company::select('name', 'id')->get();

        return response()->json(['success' => true, 'data' => $companys], 200);
    }

    public function store(UserRequest $request)
    {
        $res = $this->userService->create($request->input());

        if ($res) {
            return response()->json(['success' => true, 'data' => $res], 201);
        } else {
            return response()->json(['success' => false], 401);
        }
    }
    public function show($id)
    {
    }

    public function edit($id)
    {
        $companys = Company::pluck('name', 'id')->toArray();
        $user = $this->userService->getById($id);
        return response()->json(['success' => true, 'user' => $user, 'companyList' => $companys], 200);
    }

    public function update(UserRequest $request, $id)
    {
        $res = $this->userService->updateUser($id, $request->input());
        if ($res) {
            return response()->json(['success' => true, "data" => $res]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function destroy($id)
    {
        $user = User::with('role')->find($id);
        if ($user->role->name != 'admin') {
            $user->comments()->delete();
            $user->post()->delete();
            $user->comment_like()->delete();
            $user->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $listUser = User::whereIn('id', $ids)->with('role')->get();
        foreach ($listUser as $user) {
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
