<?php

namespace App\Services;

use App\Models\Company;
use App\Models\CompanyAccount;

class CompanyService
{

    public $uploadImage;
    
    public function __construct(UploadImage $uploadImage)
    {
        $this->uploadImage = $uploadImage;
    }

    public function getById($id)
    {
        return Company::findOrFail($id);
    }
    public function getAll($sortData)
    {
        if (!empty($sortData)) {
            return Company::with('companyAccount.getAccount')->orderBy('active', $sortData['direction'])->paginate(10);
        }
        return Company::with('companyAccount.getAccount')->paginate(10);
    }
    public function create($data)
    {
        $path = 'public/images/company';
        $data['avatar'] = $this->uploadImage->savefile($path, $data['avatar']);
        Company::create($data);
        return true;
    }
    public function update($data)
    {
        $company = Company::find($data['company']);
        if (!empty($data['avatar'])) {
            $path = 'public/images/company';
            $data['avatar'] = $this->uploadImage->savefile($path, $data['avatar']);
            $company->avatar = $data['avatar'];
        }
        $company->update($data);
        return true;
    }
}
