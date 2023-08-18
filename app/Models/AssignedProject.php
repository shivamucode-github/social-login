<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AssignedProject extends Pivot
{
    use HasFactory;
    protected $table = 'assigned_projects';
    protected $fillable = [
        'user_id',
        'project_id'
    ];
}
