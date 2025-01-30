<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profil;
use App\Models\Organization;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function json() //memanggil data json untuk datatable server
    {
        return DataTables::of(User::query())->toJson();
    }

    public function index()
    {
        // $role = Role::findByName(Auth::user()->role);
        // $permissions = Permission::whereIn('id', [5])->pluck('name','name')->all();
        // $role->revokePermissionTo($permissions);
        // // $role->syncPermissions($permissions);
        // $userId = User::find(Auth::user()->id);

        $datauser = User::with('organization')->whereNot('name','developer')->latest()->get()->whereNotIn('email','alpatester@siap.app');
        return view('SAdmin.User.index', compact('datauser'));

        // if($userId->can('user-create')){
        //     $datauser = User::with('organization')->whereNot('name','developer')->latest()->get()->whereNotIn('email','alpatester@siap.app');
        //     return view('SAdmin.User.index', compact('datauser'));

        // };

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $org = Organization::latest()->get()->where('status','enable');
        return view('SAdmin.User.add', compact('org'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check_email = User::where('email',$request->email)->first();

        if (empty($check_email)){

            $newData = new User();
            $newData ->id = Str::uuid();
            $newData ->name =  $request->name;
            $newData ->email = $request->email;
            $newData ->role = 'admin';
            $newData ->password = bcrypt('1234');
            $newData ->save();

            Profil::create([
                'id' => Str::uuid(),
                'user_id' => $newData->id,
                'organization_id' => $request->org,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
                'nohp' => $request->nohp
            ]);

            $newData->assignRole( $newData->role);

            Alert::success('Success', 'New admin has been successfully added');
            return back();

        }else{
            Alert::warning('Error', 'Email already use.');
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $org = Organization::latest()->get()->where('status','enable');

        return view('SAdmin.User.edit', compact('org','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();

        $profil = Profil::find($request->idprofil);
        $profil->organization_id = $request->organization;
        $profil->nip = $request->nip;
        $profil->jabatan = $request->jabatan;
        $profil->nohp = $request->nohp;
        $profil->save();

        $user->syncRoles($user->role);

        Alert::success('Success', 'User has been successfully updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::find($id);

        if ($User->status == 'enable') {
            # code...
            $User->status = 'disable';
        } else {
            # code...
            $User->status = 'enable';
        }
        $User->save();

        Alert::success('Berhasil', 'Status Pengguna berhasil diperbaharui ('.$User->status.')');
        return  back();
    }

    // =================== other function =================================

    public function reset_pass($id)
    {
        $user = User::find($id);
        $user->password = bcrypt('1234');
        $user->save();

        Alert::success('Berhasil', 'Password pengguna telah direset !');
        return back();

    }

    public function operator()
    {
        $datauser = User::with('organization','profil')->where('role','operator')->latest()->get()->where('profil.organization_id',Auth::user()->profil->organization_id);
        return view('Admin.User.index', compact('datauser'));
    }

    public function create_operator()
    {
        return view('Admin.User.add');
    }

    public function store_operator(Request $request)
    {
        $check_email = User::where('email',$request->email)->first();

        if (empty($check_email)){

            $newData = new User();
            $newData ->id = Str::uuid();
            $newData ->name =  $request->name;
            $newData ->email = $request->email;
            $newData ->role = 'operator';
            $newData ->password = bcrypt('1234');
            $newData ->save();

            Profil::create([
                'id' => Str::uuid(),
                'user_id' => $newData->id,
                'organization_id' => Auth::user()->profil->organization_id,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
                'nohp' => $request->nohp
            ]);

            Alert::success('Berhasil', 'Akun operator berhasil didaftarkan');
            return back();

        }else{
            Alert::warning('Oops', 'Emailnya sudah terdaftar, silahkan gunakan email yang lain.');
            return back();
        }

    }

    public function edit_operator($id)
    {
        $user = User::find($id);
        return view('Admin.User.edit', compact('user'));
    }

    public function update_operator(Request $request)
    {
        $user = User::find($request->iduser);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->save();

        $profil = Profil::find($request->idprofil);
        $profil->nip = $request->nip;
        $profil->jabatan = $request->jabatan;
        $profil->nohp = $request->nohp;
        $profil->save();

        Alert::success('Berhasil', 'Data operator berhasil diperbaharui');
        return back();
    }

    public function disable_operator($id)
    {
        $User = User::find($id);

        if ($User->status == 'enable') {
            # code...
            $User->status = 'disable';
        } else {
            # code...
            $User->status = 'enable';
        }
        $User->save();

        Alert::success('Berhasil', 'Status operator berhasil diperbaharui ('.$User->status.')');
        return  back();
    }

    public function reset_pass_operator($id)
    {
        $user = User::find($id);
        $user->password = bcrypt('1234');
        $user->save();

        Alert::success('Berhasil', 'Password operator telah direset !');
        return back();

    }
}
