<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //menampilkan semua data role
        $datas = Role::get()->whereNotIn('name','superadmin');
        return view('Sadmin.Role.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $permissions = Permission::all();
        // dd($permissions);
        return view('Sadmin.Role.add',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        try {
            //code...

            $request->validate([

                'name' => 'required',
                'permissions' => 'required|array'
            ]);

            // dd($request->permissions);


            $role = Role::create(['name' => $request->name]);
            $role->syncPermissions($request->permissions);

            Alert::success('Success', 'Role and setting permission has been successfully added. ');
            return back();
        } catch (\Throwable $th) {
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
        $role = role::find($id);
        $rolepermission = $role->permissions;
        $allpermissions = Permission::all();
        // dd($permissions);
        return view('Sadmin.Role.edit',compact('role','rolepermission','allpermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            //code...
            $request->validate([

                'name' => 'required',
                'permissions' => 'required|array'
            ]);

            // dd($request->permissions);

            $role = Role::find($id);
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($request->permissions);

            Alert::success('Success', 'Role and setting permission has been successfully added. ');
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
