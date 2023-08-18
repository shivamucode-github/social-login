<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AssignedRole extends Pivot
{
    use HasFactory;

    protected $table = 'assigned_roles';
    protected $fillable = [
        'user_id',
        'role_id'
    ];

}
