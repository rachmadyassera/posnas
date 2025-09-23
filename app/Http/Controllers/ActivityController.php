<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Documentation;
use App\Models\Historyactivity;
use App\Models\Notesactivity;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Auth::user()->getRoleNames()->first();
        // dd($roles);

        $activity = Activity::with('organization', 'user')
            ->where('status', 'enable')
            ->where('organization_id', Auth::user()->profil->organization_id)
            ->reorder('date_activity', 'desc')
            ->get();

        return view('Admin.Agenda.index', compact('activity', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Agenda.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request_date = Carbon::parse($request->date_activity)->toDateTimeString();
        // dd($request_date, $request->date_activity);
        $check_date_act = Activity::where('date_activity', $request_date)
            ->where('status', 'enable')
            ->where('organization_id', Auth::user()->profil->organization_id)
            ->first();

        $newData = new Activity;
        $newData->id = Str::uuid();
        $newData->user_id = Auth::user()->id;
        $newData->organization_id = Auth::user()->profil->organization_id;
        $newData->date_activity = $request->date_activity;
        $newData->name_activity = $request->name_activity;
        $newData->location = $request->location;
        $newData->description = $request->description;
        $newData->accompanying_officer = $request->accompanying_officer;
        $newData->is_private = $request->private;

        $date_subhour = Carbon::parse($request_date)->subHour();
        $date_addhour = Carbon::parse($request_date)->addHour();
        $arround_act = Activity::whereBetween('date_activity', [$date_subhour, $date_addhour])
            ->where('status', 'enable')
            ->where('organization_id', Auth::user()->profil->organization_id)
            ->get();

        if ($arround_act->count() > 0) {
            // code...
            $newData->status = 'disable';
            $newData->save();
            Alert::warning('Perhatian !', 'Ada jadwal pada waktu yang sama. !');

            return redirect()->route('activity.show', $newData->id);
        } else {
            $newData->status = 'enable';
            $newData->save();

            Alert::success('Berhasil', 'Kegiatan berhasil dijadwalkan !');

            return redirect()->route('activity.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $act = Activity::find($id);
        // dd($act);
        $date_subhour = Carbon::parse($act->date_activity)->subHour();
        $date_addhour = Carbon::parse($act->date_activity)->addHour();
        $start_date = Carbon::parse($date_subhour)->toDateTimeString();
        $end_date = Carbon::parse($date_addhour)->toDateTimeString();
        $arround_act = Activity::whereBetween('date_activity', [$date_subhour, $date_addhour])
            ->where('organization_id', Auth::user()->profil->organization_id)
            ->where('status', 'enable')
            ->get();

        // dd($date_subhour, $date_addhour,$start_date, $end_date);
        // dd($arround_act->count());
        return view('Admin.Agenda.show', compact('act', 'arround_act'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Auth::user()->getRoleNames()->first();
        $act = Activity::find($id);
        if (Auth::user()->profil->organization_id == $act->organization_id) {
            // code...

            if ($role == 'admin' or Auth::user()->id == $act->user_id) {
                // code...
                return view('Admin.Agenda.edit', compact('act'));
            } else {
                Alert::warning('Oops', 'Anda tidak memiliki hak akses untuk halaman ini !');

                return redirect()->route('activity.index');
            }
        } else {
            Alert::warning('Oops', 'Anda tidak memiliki hak akses untuk halaman ini !');

            return redirect()->route('activity.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request_date = Carbon::parse($request->date_activity)->toDateTimeString();
        $act = Activity::find($id);

        $date_subhour = Carbon::parse($act->date_activity)->subHour();
        $date_addhour = Carbon::parse($act->date_activity)->addHour();
        // dd($act);

        $arround_act = Activity::whereBetween('date_activity', [$date_subhour, $date_addhour])
            ->where('status', 'enable')
            ->where('organization_id', Auth::user()->profil->organization_id)
            ->whereNot('id', $act->id)
            ->get();

        if ($arround_act->count() > 0) {
            // code...
            Alert::warning('Perhatian !', 'Ada jadwal pada waktu yang sama. !');

            return redirect()->route('activity.show', $act->id);
        } else {
            $act->date_activity = $request_date;
            $act->name_activity = $request->name_activity;
            $act->location = $request->location;
            $act->description = $request->description;
            $act->accompanying_officer = $request->accompanying_officer;
            $act->is_private = $request->private;
            $act->save();
            $newLog = new Historyactivity;
            $newLog->id = Str::uuid();
            $newLog->activity_id = $id;
            $newLog->log = 'Updated By '.Auth::user()->name;
            $newLog->save();

            Alert::success('Berhasil', 'Data kegiatan berhasil diperbaharui');

            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $act = Activity::find($id);
        $act->status = 'disable';
        $act->save();

        $newLog = new Historyactivity;
        $newLog->id = Str::uuid();
        $newLog->activity_id = $id;
        $newLog->log = 'Destroy By '.Auth::user()->name;
        $newLog->save();

        Alert::success('Berhasil', 'Kegiatan ('.$act->name_activity.') berhasil dihapus.');

        return back();
    }

    public function cancel_activity($id)
    {
        $act = Activity::find($id);
        $role = Auth::user()->getRoleNames()->first();
        $act->status_activity = 'cancel';

        $newData = new Historyactivity;
        $newData->id = Str::uuid();
        $newData->activity_id = $id;
        $newData->log = 'Kegiatan ini telah di'.$act->status_activity.' Oleh '.Auth::user()->name;

        if (Auth::user()->profil->organization_id == $act->organization_id) {
            // code...

            if ($role == 'admin' or Auth::user()->id == $act->user_id) {
                // code...
                $newData->save();
                $act->save();

                Alert::success('Berhasil', 'Kegiatan ('.$act->name_activity.') berhasil dibatalkan.');

                return back();
            } else {
                Alert::warning('Oops', 'Akses ditolak, silahkan coba lagi nanti.');

                return back();
            }
        } else {
            Alert::warning('Oops', 'Akses ditolak, data bukan milik anda.');

            return back();
        }
    }

    public function approve_activity(string $id)
    {
        $act = Activity::find($id);
        $role = Auth::user()->getRoleNames()->first();

        if (Auth::user()->profil->organization_id == $act->organization_id) {
            // code...

            if ($role == 'admin' or Auth::user()->id == $act->user_id) {
                // code...
                $act->status = 'enable';
                // dd($act);
                $act->save();

                $newLog = new Historyactivity;
                $newLog->id = Str::uuid();
                $newLog->activity_id = $id;
                $newLog->log = 'Approve By '.Auth::user()->name;
                $newLog->save();

                Alert::success('Berhasil', 'Kegiatan ('.$act->name_activity.') berhasil didaftarkan.');

                return redirect()->route('activity.index');
            } else {
                Alert::warning('Oops', 'Anda tidak memiliki hak akses untuk halaman ini !');

                return redirect()->route('activity.index');
            }
        } else {
            Alert::warning('Oops', 'Anda tidak memiliki hak akses untuk halaman ini !');

            return redirect()->route('activity.index');
        }
    }

    public function detail_activity(string $id)
    {
        $act = Activity::find($id);
        $notes = Notesactivity::with('user', 'activity', 'documentation')->where('activity_id', $id)->reorder('created_at', 'asc')->where('status', 'enable')->get();
        // dd($act, $notes[0]->documentation);

        $logs = Historyactivity::with('activity')->where('activity_id', $id)->reorder('created_at', 'asc')->limit(10)->get();

        // if ($act->status == 'disable' OR $act->status_activity == 'cancel' ) {
        // if ($act->status == 'disable' OR $act->status_activity == 'cancel' ) {
        //     # code...
        //     Alert::warning(
        //         'Oops',
        //         'Kegiatan telah dihapus, atau telah dibatalkan.',
        //     );
        //     return redirect()->route('dashboard.index');
        // }
        return view('Operator.Agenda.detail', compact('act', 'notes', 'logs'));
    }

    public function store_notes(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'notes' => 'required|string',
                'images' => 'required|array',
                'images.*' => 'required|image|mimes:jpeg,png,jpg',
            ],
            [
                'notes.required' => 'Catatan masih kosong',
                'images.required' => 'Minimal satu file gambar harus diunggah',
                'images.*.mimes' => 'Format file harus berupa JPG atau PNG',
                'images.*.image' => 'File yang diunggah harus berupa gambar',
            ],
        );

        // dd($request->file('images'));
        if ($validator->fails()) {
            $errors = $validator->errors();

            // Jika mau pakai Alert
            Alert::warning('Gagal Menyimpan Catatan', implode(', ', $errors->all()));

            // Redirect back dengan input + pesan error
            return back();
        }

        DB::beginTransaction();
        try {
            $idact = $request->idactivity;
            $act = Activity::find($idact);

            if (! $act) {
                Alert::warning('Oops', 'Kegiatan telah dibatalkan atau dihapus, tidak dapat menambahkan komentar.');

                return redirect()->route('show-activity', $idact);
            }

            if ($act->status === 'disable' || $act->status_activity === 'cancel') {
                Alert::warning('Oops', 'Kegiatan telah dibatalkan atau dihapus, tidak dapat menambahkan komentar.');

                return redirect()->route('show-activity', $idact);
            }

            // Simpan Notesactivity lebih dulu
            $newData = new Notesactivity;
            $newData->id = Str::uuid();
            $newData->activity_id = $idact;
            $newData->user_id = Auth::id();
            $newData->notes = $request->notes;
            $newData->save();

            // Loop file images (baik 1 atau banyak)
            foreach (Arr::wrap($request->file('images')) as $file) {
                $filename = time().'-'.uniqid().'.'.$file->getClientOriginalExtension();

                // Resize & compress
                $img = Image::read($file->getRealPath());
                // $img->resize(800, null, function ($constraint) {
                //     $constraint->aspectRatio();
                //     $constraint->upsize();
                // });

                $path = public_path('images/'.$filename);

                $img->toJpeg(20)->save($path); // kualitas 80%
                // $img->save($path, quality: 25);

                // Simpan ke Documentation
                Documentation::create([
                    'id' => Str::uuid(),
                    'notesactivity_id' => $newData->id,
                    'user_id' => Auth::id(),
                    'picture' => $filename,
                ]);
            }

            // Update Activity
            $act->status_activity = 'complete';
            $act->save();

            // Tambahkan ke History
            Historyactivity::create([
                'id' => Str::uuid(),
                'activity_id' => $idact,
                'log' => 'Add Note By '.Auth::user()->name,
            ]);

            DB::commit();
            Alert::success('Berhasil', 'Catatan dan Dokumentasi berhasil didaftarkan');

            return redirect()->route('show-activity', $idact);
        } catch (\Exception $e) {
            DB::rollBack();

            Alert::warning('Error', 'Gagal menyimpan data: '.$e->getMessage());

            return back();
        }
    }

    public function deleteNote(string $id)
    {
        $note = Notesactivity::find($id);
        $note->status = 'disable';
        $note->save();

        $doc = Documentation::where('notesactivity_id', $id)->get();

        $newLog = new Historyactivity;
        $newLog->id = Str::uuid();
        $newLog->activity_id = $note->activity_id;
        $newLog->log = 'Destroy Comment : '.$note->notes.' By '.Auth::user()->name;
        // dd($newLog->log);
        $newLog->save();
        // File::delete('images/'.$doc->picture);
        // $doc->delete();

        foreach ($doc as $pic) {
            // Storage::delete("uploaded-images/{$image}");
            File::delete("images/{$pic->picture}");
        }

        Alert::success('Berhasil', 'Komentar ('.$note->notes.') berhasil dihapus.');

        return back();
    }

    public function search_activity()
    {
        return view('Admin.Agenda.search');
    }

    public function get_activity(Request $request)
    {
        $startDate = Carbon::parse($request->tglawal);
        $endDate = Carbon::parse($request->tglakhir)->addDay();
        $activity = Activity::whereBetween('date_activity', [$startDate, $endDate])
            ->where('status', 'enable')
            ->where('organization_id', Auth::user()->profil->organization_id)
            ->reorder('date_activity', 'asc')
            ->get();

        // dd($act, $notes[0]->documentation);
        return view('Admin.Agenda.index', compact('activity'));
    }

    public function detail_master_activity(string $id)
    {
        $act = Activity::find($id);
        $notes = Notesactivity::with('user', 'activity', 'documentation')->where('activity_id', $id)->where('status', 'enable')->get();
        $logs = Historyactivity::with('activity')->where('activity_id', $id)->reorder('created_at', 'desc')->limit(10)->get();
        // dd($act, $notes[0]->documentation);

        return view('Admin.Agenda.detail', compact('act', 'notes', 'logs'));
    }

    public function report_activity()
    {
        return view('Admin.Agenda.report');
    }

    public function downloadReport(Request $request)
    {
        $startDate = Carbon::parse($request->tglawal)->subDay();
        $endDate = Carbon::parse($request->tglakhir)->addDay();
        $formatstartDate = Carbon::parse($request->tglawal)->isoFormat('dddd, D MMMM Y');
        $formatendDate = Carbon::parse($request->tglakhir)->isoFormat('dddd, D MMMM Y');

        if ($role = Auth::user()->getRoleNames()->first() == 'admin') {
            // code...
            $activity = Activity::with('notesactivity')
                ->whereBetween('date_activity', [$startDate, $endDate])
                ->where('status', 'enable')
                ->where('status_activity', 'complete')
                ->where('organization_id', Auth::user()->profil->organization_id)
                ->reorder('date_activity', 'asc')
                ->get()
                ->groupBy(function ($item) {
                    // Format tanggal biar lebih rapi
                    return Carbon::parse($item->date_activity)->format('Y-m-d');
                });
        } else {
            // code...

            $activity = Activity::with('notesactivity')
                ->whereBetween('date_activity', [$startDate, $endDate])
                ->where('status', 'enable')
                ->where('status_activity', 'complete')
                ->where('organization_id', Auth::user()->profil->organization_id)
                ->where('user_id', Auth::user()->id)
                ->reorder('date_activity', 'asc')
                ->get()
                ->groupBy(function ($item) {
                    // Format tanggal biar lebih rapi
                    return Carbon::parse($item->date_activity)->format('Y-m-d');
                });
        }

        $title = 'Laporan Kegiatan '.Auth::user()->profil->organization->name;
        $subTitle = 'Pada Hari '.$formatstartDate.' s/d '.$formatendDate;
        // return view('Admin.Agenda.report-table', compact('activity','title','subTitle'));

        $pdf = PDF::loadview('Admin.Agenda.report-table', compact('activity', 'title', 'subTitle'))->setPaper('legal', 'landscape');

        return $pdf->download($title.'.pdf');
    }

    public function savePdf(string $id)
    {
        $act = Activity::with('notesactivity')
            ->where('status', 'enable')
            ->where('id', $id)
            ->where('status_activity', 'complete')
            ->where('organization_id', Auth::user()->profil->organization_id)
            ->first();

        // dd($id,$act);

        $title = 'Laporan Kegiatan '.Auth::user()->profil->organization->name;
        $options = [
            'dpi' => 150, // Mengurangi DPI dari default (biasanya 150 atau 300)
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true, // Nonaktifkan jika tidak butuh gambar/CSS dari luar
        ];
        $pdf = PDF::loadView('Admin.Agenda.single-data-pdf', compact('act', 'title'))->setPaper('legal', 'portrait');

        // $pdf->setOptions($options);

        // return view('Admin.Agenda.single-data-pdf',compact('act', 'title'));
        return $pdf->download($title.'.pdf');
    }

    public function searchActivity()
    {
        return view('Admin.Agenda.timeline-agenda');
    }

    public function downloadTimeline(Request $request)
    {
        $startDate = Carbon::parse($request->tglawal);
        $endDate = Carbon::parse($request->tglakhir)->addDay();
        $formatstartDate = Carbon::parse($request->tglawal)->isoFormat('dddd, D MMMM Y');
        $formatendDate = Carbon::parse($request->tglakhir)->isoFormat('dddd, D MMMM Y');

        if ($role = Auth::user()->getRoleNames()->first() == 'admin') {
            // code...
            $activity = Activity::with('historyactivity')
                ->whereBetween('date_activity', [$startDate, $endDate])
                ->where('status', 'enable')
                ->where('organization_id', Auth::user()->profil->organization_id)
                ->reorder('date_activity', 'asc')
                ->get()
                ->groupBy(function ($item) {
                    // Format tanggal biar lebih rapi
                    return Carbon::parse($item->date_activity)->format('Y-m-d');
                });
        } else {
            // code...
            $activity = Activity::with('historyactivity')
                ->whereBetween('date_activity', [$startDate, $endDate])
                ->where('status', 'enable')
                ->where('organization_id', Auth::user()->profil->organization_id)
                ->where('user_id', Auth::user()->id)
                ->reorder('date_activity', 'asc')
                ->get()
                ->groupBy(function ($item) {
                    // Format tanggal biar lebih rapi
                    return Carbon::parse($item->date_activity)->format('Y-m-d');
                });
        }

        $title = 'Agenda '.Auth::user()->profil->organization->name;
        $subTitle = 'Pada Hari '.$formatstartDate.' s/d '.$formatendDate;

        if ($request->private == 'disprivate') {
            $pdf = PDF::loadview('Admin.Agenda.disprivate-timeline', compact('activity', 'title', 'subTitle'))->setPaper('legal', 'landscape');
        } else {
            $pdf = PDF::loadview('Admin.Agenda.timeline', compact('activity', 'title', 'subTitle'))->setPaper('legal', 'landscape');
        }

        return $pdf->download($title.'.pdf');
    }

    public function all_activity()
    {
        $activity = Activity::with('organization', 'user')->reorder('date_activity', 'desc')->get();

        return view('Sadmin.Agenda.index', compact('activity'));
    }
}
