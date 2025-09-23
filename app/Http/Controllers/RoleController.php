<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menampilkan semua data role
        $datas = Role::get()->whereNotIn('name', 'superadmin');

        return view('Sadmin.Role.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $permissions = Permission::all();
        // dd($permissions);

        $groupedPermissions = Permission::all()->groupBy('module');

        // $groupedPermissions = $permissions->groupBy(function ($permission) {
        // return explode('-', $permission->name)[0]; // ambil nama modul
        // });
        return view('Sadmin.Role.add', compact('groupedPermissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        try {
            // code...

            $request->validate([

                'name' => 'required',
                'permissions' => 'nullable|array', // jangan required
                'permissions.*' => 'exists:permissions,id',
            ]);

            // dd($request->permissions);

            $role = Role::create(['name' => $request->name]);
            // $role->syncPermissions($request->permissions);
            $permissions = Permission::whereIn('id', $request->permissions)->get();
            $role->syncPermissions($permissions);

            Alert::success('Success', 'Role and setting permission has been successfully added. ');

            return back();

        } catch (\Throwable $th) {
            // dd($th->getMessage());
            Alert::warning('Error', 'Something wrong, please try again.');

            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $role = role::findOrFail($id);
        // $rolepermission = $role->permissions;
        // $allpermissions = Permission::all();
        $groupedPermissions = Permission::all()->groupBy('module');

        // dd($permissions);
        return view('Sadmin.Role.edit', compact('role', 'groupedPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            // code...
            $request->validate([
                'name' => 'required|string|unique:roles,name,'.$id, // unik kecuali role ini
                'permissions' => 'nullable|array',
                'permissions.*' => 'exists:permissions,id',
            ]);

            $role = Role::findOrFail($id);

            // Update nama role
            $role->update([
                'name' => $request->name,
            ]);

            // Update permission
            if ($request->filled('permissions')) {
                $permissions = Permission::whereIn('id', $request->permissions)->get();
                $role->syncPermissions($permissions);
            } else {
                // kalau tidak ada permission dicentang, kosongkan semua
                $role->syncPermissions([]);
            }

            Alert::success('Success', 'Role and setting permission has been successfully updated. ');

            return back();
        } catch (\Throwable $th) {
            Alert::warning('Error', 'Something wrong, please try again.');

            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
