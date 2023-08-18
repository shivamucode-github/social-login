<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'email',
        'password',
        'google_id',
        'current_role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public function roleAssigned()
    {
        return $this->belongsToMany(Role::class, 'assigned_roles')->withTimestamps();
    }

    public function projectAssigned()
    {
        return $this->belongsToMany(Project::class, 'assigned_projects')->withTimestamps();
    }

    public function  companyAssigned()
    {
        return $this->belongsToMany(Company::class, 'assigned_companies')->withTimestamps();
    }

    public function getRoleAttribute()
    {
        return implode(',', collect($this->roleAssigned->pluck('name')->toArray())->unique()->toArray());
    }

    public function getCompanyAttribute()
    {
        return implode(',', collect($this->companyAssigned->pluck('name')->toArray())->unique()->toArray());
    }

    public function getProjectAttribute()
    {
        return implode(',', collect($this->projectAssigned->pluck('name')->toArray())->unique()->toArray());
    }
}
