<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Confrence;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PresenceController extends Controller
{
    //
    public function check_in($id)
    {
        //
        $datenow =Carbon::now();
        $rapat = Confrence::find($id);
        $title = 'Presensi Kegiatan '.$rapat->title;
        if ($rapat->status == 'disable') {
            # code...
            Alert::warning('Oops', 'Daftar hadir tidak ditemukan');
            return view('front-end.presence.rapat-disable', compact('title'));
        }
        // dd($datenow->toDateString(), Carbon::parse($rapat->date_confrence)->format('Y-m-d'));
        if (Carbon::parse($rapat->date_confrence)->format('Y-m-d') !== $datenow->toDateString()) {
            # code...
            // dd($rapat->tanggal, $datenow->toDateString() );

            Alert::warning('Oops', 'Daftar hadir tidak ditemukan');
            return view('front-end.presence.rapat-disable', compact('title'));
        }
        return view('front-end.presence.formulir-kehadiran', compact('rapat','title'));
    }

    public function store(Request $request)
    {
        //
        $datenow =Carbon::now();
        $rapat = Confrence::find($request->confrence);
        if ($rapat->status == 'disable') {
            # code...
            Alert::warning('Oops', 'Daftar hadir tidak ditemukan');
            return view('front-end.presence.rapat-disable');
        }
        if (Carbon::parse($rapat->date_confrence)->format('Y-m-d') !== $datenow->toDateString()) {
            # code...
            Alert::warning('Oops', 'Daftar hadir tidak ditemukan');
            return view('front-end.presence.rapat-disable');
        }

        $uuid = Str::uuid();

        $folderPath = public_path('presensi/signature/');
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        if (empty($image_type_aux[1])) {
            # code...
            Alert::warning('Oops', 'Tandatangan tidak boleh kosong.');
            return redirect()->route('presence.check-in',$request->confrence);
        }
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . $uuid . '.'.$image_type;
        file_put_contents($file, $image_base64);

        Presence::create([
            'id' => $uuid,
            'confrence_id' => $request->confrence,
            'name' => $request->name,
            'organization' => $request->organization,
            'position' => $request->position,
            'id_employee' => $request->id_employee,
            'gender' => $request->gender,
            'nohp' => $request->nohp,
            'signature' => $uuid.'.'.$image_type
        ]);

        Alert::success('Berhasil', 'Terimakasih telah hadir.');
        return redirect()->route('presence.check-in',$request->confrence);
    }


    public function disable_participant($id)
    {
        $rpt = Presence::find($id);
        $rpt->status = 'disable';
        $rpt->save();

        Alert::success('Berhasil', 'Peserta berhasil dihapus');
        return back();
    }
}
