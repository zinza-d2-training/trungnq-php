<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'user_id',
    ];

    public function getAccount()
    {
        return $this->hasOne(User::class, 'id', 'user_id')/* ->ofMany('id', 'max') */;
    }
    public function getCompany()
    {
        return $this->hasOne(User::class, 'id', 'user_id')/* ->ofMany('id', 'max') */;
    }
}
