<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function index()
    {
        $role = Role::where('slug', 'admin')->first();
        if($role->slug == 'admin'){
            $permissions = Permission::all();
            return view('role-permission.index', compact('permissions'));
        }else {
            abort(404);
        }
    }
    public function store(Request $request)
    {
       $data = new Permission();
       $data->name = $request->name;
       $data->slug = $request->slug;
       $data->save();
       return back();
    }
    public function roleIndex()
    {
        $roles = Role::all();
        return view('role-permission.role-index', compact('roles'));
    }
    public function roleStore(Request $request)
    {
        $data = new Role();
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->save();
        return back();
    }
}
