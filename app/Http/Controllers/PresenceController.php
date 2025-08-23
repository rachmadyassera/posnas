<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Presence;
use App\Models\Confrence;
use Illuminate\Support\Str;
use App\Models\Organization;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PresenceController extends Controller
{
    //
    public function check_in($id)
    {
        //
        $datenow =Carbon::now();
        $rapat = Confrence::find($id);
        $org = Organization::orderBy('created_at', 'asc')->get()->where('status','enable');
        $title = 'Presensi Kegiatan '.$rapat->title;
        if ($rapat->status == 'disable') {
            # code...
            Alert::warning('Oops', 'Presensi kegiatan tidak ditemukan');
            return view('front-end.presence.rapat-disable', compact('title'));
        }
        // dd($datenow->toDateString(), Carbon::parse($rapat->date_confrence)->format('Y-m-d'));
        if (Carbon::parse($rapat->date_confrence)->format('Y-m-d') !== $datenow->toDateString()) {
            # code...
            // dd($rapat->tanggal, $datenow->toDateString() );

            Alert::warning('Oops', 'Daftar hadir tidak ditemukan');
            return view('front-end.presence.rapat-disable', compact('title'));
        }
        return view('front-end.presence.formulir-kehadiran', compact('org','rapat','title'));
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
        $organization = $request->organization === 'Lainnya' ? $request->other_organization : $request->organization;

        if ( $request->organization === 'Lainnya') {
            # code...
            if (empty($request->other_organization)) {
                # code...

                Alert::warning('Data tidak valid', 'Organisasi belum diisi, silahkan input kembali dengan benar.');
                return redirect()->route('presence.check-in', $request->confrence);
            }

            Organization::create([
                'id' => Str::uuid(),
                'name' => $request->other_organization,
                'address' => '-',
                'longitude' => '-',
                'latitude' => '-',
            ]);
        }


        Presence::create([
            'id' => $uuid,
            'confrence_id' => $request->confrence,
            'name' => $request->name,
            'organization' => $organization,
            'position' => $request->position,
            'id_employee' => $request->id_employee,
            'gender' => $request->gender,
            'nohp' => $request->nohp,
            'signature' => $uuid.'.'.$image_type
        ]);

        Alert::success('Berhasil', 'Terimakasih telah hadir.');
        // return redirect()->route('presence.check-in',$request->confrence);
        return redirect()->route('presence.validation', $uuid);

    }


    public function presence_detail($id)
    {
        $pres = Presence::find($id);
        $rapat = Confrence::find($pres->confrence_id);
        $title = 'Validasi Presensi ';

        if ($rapat->status == 'disable') {
            # code...
            Alert::warning('Oops', 'Daftar hadir tidak ditemukan');
            return view('front-end.presence.rapat-disable', compact('title'));
        }

            return view('front-end.presence.detail-presensi', compact('pres','rapat','title'));

    }


    public function disable_participant($id)
    {
        $rpt = Participant::find($id);
        $rpt->status = 'disable';
        $rpt->save();

        Alert::success('Berhasil', 'Peserta berhasil dihapus');
        return back();
    }

}
