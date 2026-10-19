<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;

class AdminUserController extends Controller
{
    /**
     * Dashboard Utama Admin (/admin).
     */
    public function dashboard()
    {
        $totalUsers  = User::count();
        $totalApps   = Application::count();
        $pendingApps = Application::where('status', 'pending')->count();
        $recentUsers = User::latest()->take(5)->get();

        return view('admin.users', [
            'type'        => 'dashboard',
            'totalUsers'  => $totalUsers,
            'totalApps'   => $totalApps,
            'pendingApps' => $pendingApps,
            'recentUsers' => $recentUsers,
            'users'       => $recentUsers, // Mencegah Undefined Variable $users di Blade
        ]);
    }

    /**
     * Manajemen Seluruh Pengguna (/admin/users).
     */
    public function indexUsers()
    {
        $users = User::select('id', 'name', 'email', 'role', 'created_at')
            ->latest()
            ->get();

        return view('admin.users', [
            'type'  => 'index',
            'users' => $users,
        ]);
    }
}