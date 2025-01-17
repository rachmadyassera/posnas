<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{
    public function index()
    {
        $title_frm = "Profil data diri";
        $iduser = Auth::user()->id;
        $datauser = User::find($iduser);

        return view('Profil.index', compact('datauser','title_frm'));
    }

    public function change_password(Request $request)
    {
        $user = User::find($request->id);
        $user->password = bcrypt($request->password);
        $user->save();

        Alert::success('Berhasil', 'Password berhasil diperbaharui');
        return back();
    }
}
