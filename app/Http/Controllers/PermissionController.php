<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //menampilkan semua data permission
       $datas = Permission::all();
       return view('Sadmin.Permission.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Permission::create(['name' => $request->name,'module' => $request->module]);

        Alert::success('Success', 'Permission has been successfully added. ');
        return back();

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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->module = $request->module;
        $permission->save();

        Alert::success('Success', 'Permission has been successfully updated');
        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pms = Permission::find($id);
        $pms->delete();

        Alert::success('Success', 'Permission has been successfully Deleted');
        return redirect()->route('permission.index');
    }
}
