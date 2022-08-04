<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Facades\Config;

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
            return Company::with('user')
                ->orderBy($sortData['sort'], $sortData['direction'])
                ->paginate(Config::get('constants.paginate'));
        }

        return Company::with('user')->get();
    }

    public function create($data)
    {
        if (empty($data['avatar'])) {
            $data['avatar'] = 'default-user.jpg';
        } else {
            $data['avatar'] = $this->uploadImage->savefile($data['avatar']);
        }
        Company::create($data);

        return true;
    }

    public function update($data)
    {
        $company = Company::find($data['id']);
        if (!empty($data['avatar'] && is_file($data['avatar']))) {
            $data['avatar'] = $this->uploadImage->savefile($data['avatar']);
            $company->avatar = $data['avatar'];
        } else unset($data['avatar']);
        $company->update($data);

        return true;
    }
}
