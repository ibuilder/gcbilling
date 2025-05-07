<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller 
{
    /**
     * Create a new RoleController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('can:manage roles');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('roles.index', compact('roles')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'nullable|array' ,
        ]);

        $role = Role::create(['name' => $request->name]);

        if ($request->has('permissions')) {
             $role->syncPermissions($request->permissions);
        }

        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     */
    public function show(Role $role)
    {
        // This method is typically not needed for basic role management UI
        // but is included for resource controller completeness.
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource
     * @param  \Spatie\Permission\Models\Role  $role
     */
    public function edit(Role $role)
    {

        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id,
            'permissions' => 'nullable|array',
        ]);

        $role->update(['name' => $request->name]);

        if ($request->has('permissions')) {
             $role->syncPermissions($request->permissions);
        }else{
           $role->syncPermissions([]);
        }

        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {   

        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully.'); 
    }
}