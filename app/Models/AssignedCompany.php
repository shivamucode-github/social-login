<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AssignedCompany extends Pivot
{
    use HasFactory;
    protected $table = 'assigned_companies';
    protected $fillable = [
        'user_id',
        'company_id'
    ];
}
