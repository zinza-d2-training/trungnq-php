<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index(Request $request)
    {
        $data = $this->companyService->getAll($request->all());
        /* dd($data[0]->companyAccount[0]->getAccount->name); */
        /* dd($data[0]->companyAccount); */
        return view('pages.company.index',['companies' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $res = $this->companyService->create($request->all());
        if ($res) {
            return back()->with('message', array("type" => 'info', "content" => "Tạo company thành công!!!"));
        }
        return back()->with('message', array("type" => 'info', "content" => "~Oppp. Đã xảy ra lỗi vui lòng thử lại!!!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->companyService->getById($id);
        return view('pages.company.edit',['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request)
    {
        $result = $this->companyService->update($request->all());
        return response()->json(['type' => 'info', "message" => "Cập nhật công ty thành công"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id)->delete;
        return response()->json(['type' => 'info', "message" => "Xóa công ty thành công"]);
    }
}
