<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $totalUsers = User::count();
        $totalRoles = Role::count();
        $totalPermissions = Permission::count();
        $recentUsers = User::latest()->take(5)->get();

        // Role distribution: role name => user count
        $roleDistribution = Role::withCount('users')->get()->pluck('users_count', 'name');

        return view('admin.dashboard.index', compact(
            'totalUsers',
            'totalRoles',
            'totalPermissions',
            'recentUsers',
            'roleDistribution'
        ));
    }
}
