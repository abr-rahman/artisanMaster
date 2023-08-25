<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function roles()
    {
        $this->belongsToMany(Role::class, 'role_has_permissions');
    }

    public function users()
    {
        $this->belongsToMany(User::class, 'user_roles');
    }
}
