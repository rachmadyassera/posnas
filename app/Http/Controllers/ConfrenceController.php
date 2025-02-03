<?php

namespace App\Http\Controllers;

use App\Models\Confrence;
use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use RealRashid\SweetAlert\Facades\Alert;

class ConfrenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd(Auth::user()->role);
        $rapat = Confrence::with(['user','opd','location'])->latest()->get()->where('status','enable')->where('opd_id', Auth::user()->profil->opd_id);
        return view('Admin.Rapat.index', compact('rapat'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $lokasi = Location::latest()->get()->where('status','enable');
        return view('Admin.Rapat.add', compact('lokasi'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $id = Str::uuid();
        Confrence::create([
            'id' => $id,
            'user_id' => Auth::user()->id,
            'opd_id' => Auth::user()->profil->opd_id,
            'location_id' => $request->location,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan
        ]);

        QrCode::generate(route ('presence.confrence', $id),  public_path('qrcodes/'.$id.'.svg'));
        Alert::success('Berhasil', 'Rapat berhasil didaftarkan');
        return redirect()->route('confrence.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $rapat = Confrence::find($id);
        $peserta = Participant::with('confrence')->latest()->get()->where('status','enable')->where('confrence_id', $id);

        return view('Admin.Rapat.peserta', compact('rapat','peserta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $lokasi = Location::get()->where('status','enable');
        $rapat = Confrence::find($id);

        if (Auth::user()->profil->opd_id !== $rapat->opd_id) {
            # code...
        Alert::warning('Oops', 'Anda tidak dapat melakukan aksi ini, masalah otorisasi');
        return redirect()->route('confrence.index');
        }

        return view('Admin.Rapat.edit', ['lokasi' => $lokasi,'rpt' => $rapat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $rpt = Confrence::find($id);
        $rpt->user_id = Auth::user()->id;
        $rpt->location_id = $request->location;
        $rpt->judul = $request->judul;
        $rpt->keterangan = $request->keterangan;
        $rpt->tanggal = $request->tanggal;
        $rpt->save();

        Alert::success('Berhasil', 'Data Rapat berhasil diperbaharui');
        return redirect()->route('confrence.index');
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
        if (Auth::user()->role == 'admin') {
            # code...

            $rpt = Confrence::find($id);
            if ($rpt->status == 'enable') {
                # code...
                $rpt->status = 'disable';
            } else {
                # code...
                $rpt->status = 'enable';
            }
            $rpt->save();

            Alert::success('Berhasil', 'Status lokasi telah diperbaharui');
            return back();

        } else {
            # code...
            $rpt = Confrence::find($id);
            $rpt->status = 'disable';
            $rpt->save();

            Alert::success('Berhasil', 'Rapat berhasil dihapus');
            return back();
        }

    }

    public function disable_participant($id)
    {
        $rpt = Participant::find($id);
        $rpt->status = 'disable';
        $rpt->save();

        Alert::success('Berhasil', 'Peserta berhasil dihapus');
        return back();
    }

    public function generate_pdf(string $id)
    {
        $rapat = Confrence::find($id);
        $peserta = Participant::with('confrence')->latest()->get()->where('status','enable')->where('confrence_id', $id);
        $title = 'Daftar Kehadiran '.$rapat->judul;
        // dd($rapat,$peserta,$title);
        // return view('Admin.Pdf.peserta', compact('rapat','peserta','title'));

        $pdf = PDF::loadview('Admin.Pdf.peserta', compact('rapat','peserta','title'))->setPaper('legal', 'potrait');
        return $pdf->download($title.'.pdf');
    }

    public function generate_pdf_qrcode(string $id)
    {
        $rapat = Confrence::find($id);
        $title = 'Qr Code Formulir Kehadiran '.$rapat->judul;
        // dd($rapat,$peserta,$title);
        $pdf = PDF::loadview('Admin.Pdf.qrcode', compact('rapat','title'))->setPaper('legal', 'potrait');
        return $pdf->download($title.'.pdf');
        // return view('Admin.Pdf.qrcode', compact('rapat','title'));

    }


    //================ function admin ======================== //

    public function all_confrence()
    {
        //
        $rapat = Confrence::with(['user','opd','location'])->latest()->get();

        return view('Admin.Rapat.index', compact('rapat'));
    }


    public function generate_all_confrence_pdf()
    {
        $rapat = Confrence::with(['user','opd','location'])->latest()->get()->where('status','enable');
        $title = 'Data Seluruh Rapat - Siakra';
        // dd($rapat,$peserta,$title);
        $pdf = PDF::loadview('Admin.Pdf.rapat', compact('rapat','title'))->setPaper('legal', 'potrait');
        return $pdf->download($title.'.pdf');
    }

    public function all_participant_confrence(string $id)
    {
        //
        $rapat = Confrence::find($id);
        $peserta = Participant::with('confrence')->latest()->get()->where('confrence_id', $id);

        return view('Admin.Rapat.peserta', compact('rapat','peserta'));
    }
}
