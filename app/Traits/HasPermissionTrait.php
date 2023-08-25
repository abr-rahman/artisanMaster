<?php
namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasPermissionTrait
{
    public function getAllPermissions($permission)
    {
        return Permission::whereIn('slug', $permission)->get();
    }

    public function hasPermission($permission)
    {
        return (bool) $this->permissions->where('slug', $permission)->count();
    }

    public function hasRole(...$roles)
    {
        foreach($roles as $role){
            if($this->roles->contains('slug', $role)){
                return true;
            }
        }
        return false;
    }

    // public function hasPermissionThroughRole($permissions)
    // {
    //     foreach($permissions->roles as $role){
    //         if($this->roles->contains($role)){
    //             return true;
    //         }
    //     }
    //     return false;
    // }

    public function hasPermissionThroughRole($permissions)
    {
        foreach ($permissions->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    public function hasPermissionTo($permission)
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions');
    }

    public function givPermissionTo(...$permissions)
    {
        $permission = $this->getAllPermissions($permissions);
        if ($permissions == null){
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }
}
