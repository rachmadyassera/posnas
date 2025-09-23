<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $org = Organization::latest()->get();

        return view('SAdmin.Organization.index', compact('org'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('SAdmin.Organization.add');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Organization::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'address' => $request->address,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);
        Alert::success('Berhasil', 'Organisasi berhasil didaftarkan');

        return redirect()->route('organization.index');
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
        $Organization = Organization::find($id);

        return view('SAdmin.Organization.edit', ['org' => $Organization]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $Organization = Organization::find($id);
        $Organization->name = $request->name;
        $Organization->address = $request->address;
        $Organization->longitude = $request->longitude;
        $Organization->latitude = $request->latitude;
        $Organization->save();

        Alert::success('Berhasil', 'Organisasi berhasil diperbaharui');

        return redirect()->route('organization.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // ======================== other function =======================

    public function disable($id)
    {
        $Organization = Organization::find($id);

        if ($Organization->status == 'enable') {
            // code...
            $Organization->status = 'disable';
        } else {
            // code...
            $Organization->status = 'enable';
        }
        $Organization->save();

        Alert::success('Berhasil', 'Status Organisasi berhasil diperbaharui');

        return redirect()->route('organization.index');

    }
}
