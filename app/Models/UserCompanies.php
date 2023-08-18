<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompanies extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'user_id',
    ];
}


