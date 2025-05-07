<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Create a new UserController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('can:manage users');
    }
    /**
     * Display a listing of the users.
     *
     * @return IlluminateViewView
     */
    public function index()
    {
        $users = User::with('roles')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified user's roles.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $userRoles = $user->roles->pluck('name')->toArray();

        return view('users.edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified user's roles in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,name',
        ]);

        $user->syncRoles($request->input('roles', []));

        return redirect()->route('admin.users.index')->with('success', 'User roles updated successfully.');
    }
}