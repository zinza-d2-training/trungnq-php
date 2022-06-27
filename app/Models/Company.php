<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'avatar',
        'address',
        'max_users',
        'expired_at',
        'active'
    ];

    public function User()
    {
        return $this->belongsToMany(User::class, 'company_accounts');
    }
}
