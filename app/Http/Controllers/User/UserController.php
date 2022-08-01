<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Models\User;

use function App\Http\Helpers\responseError;
use function App\Http\Helpers\responseSuccess;

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

        return responseSuccess($users, "true", 200);
    }

    public function create()
    {
        $companys = Company::select('name', 'id')->get();

        return responseSuccess($companys, "", 200);
    }

    public function store(UserRequest $request)
    {
        $res = $this->userService->create($request->input());

        if ($res) {
            return responseSuccess($res, "Create company success", 201);
        } else {
            return responseError(null, 401);
        }
    }
    public function show($id)
    {
    }

    public function edit($id)
    {
        $companyList = Company::pluck('name', 'id')->toArray();
        $user = $this->userService->getById($id);

        return responseSuccess(compact('companyList', 'user'), "", 200);
    }

    public function update(UserRequest $request, $id)
    {
        $res = $this->userService->updateUser($id, $request->input());

        if ($res) {
            return responseSuccess($res, "Update conpany success", 200);
        } else {
            return responseError(400, "Update error!!!");
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

            return responseSuccess(null, "true", 204);
        } else {
            return responseError(" Bạn không thể xóa admin", 400);
        }
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $listUser = User::whereIn('id', $ids)->with('role')->get();
        foreach ($listUser as $user) {
            if ($user->role->name == "admin") {
                return responseError("Bạn không thể xóa admin", 400);
            } else {
                $user->comments()->delete();
                $user->post()->delete();
                $user->comment_like()->delete();
                $user->delete();
            }
        }
        return responseSuccess(null, 'Xóa tài khoản thành công!!!', 200);
    }
}
