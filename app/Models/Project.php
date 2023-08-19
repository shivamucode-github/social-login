<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory,Sluggable,SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'created_by',
        'modified_by',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }


    // Relationships

    public function userCreatedBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function userModifiedBy(){
        return $this->belongsTo(User::class,'modified_by','id');
    }
}
