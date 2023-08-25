<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $role = Role::where('slug', 'editor')->first();

        if($role->slug == 'editor' || $role->slug == 'admin') {
            return view('dashboard', compact('users'));
        } else {
            return abort(404);
        }

    }
}
