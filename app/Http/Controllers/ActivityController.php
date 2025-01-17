<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Documentation;
use App\Models\Activity;
use App\Models\Notesactivity;
use App\Models\Historyactivity;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use File;
class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activity = Activity::with('organization','user')->where('status','enable')->where('organization_id',Auth::user()->profil->organization_id)->reorder('date_activity','desc')->get();
        return view('Admin.Agenda.index', compact('activity'));
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
        $check_date_act = Activity::where('date_activity',$request_date )->where('status','enable')->where('organization_id',Auth::user()->profil->organization_id)->first();
        // dd($check_date_act);
        if(!empty($check_date_act)){
            Alert::warning('Gagal', 'Tanggal Kegiatan memiliki waktu yang sama dengan kegiatan '.$check_date_act->name_activity.' yang telah terdaftar pada sistem');
            return  back();
        }

        $newData = new Activity();
        $newData ->id = Str::uuid();
        $newData ->user_id = Auth::user()->id;
        $newData ->organization_id = Auth::user()->profil->organization_id;
        $newData ->date_activity =  $request->date_activity;
        $newData ->name_activity = $request->name_activity;
        $newData ->location = $request->location;
        $newData ->description = $request->description;
        $newData ->accompanying_officer = $request->accompanying_officer;
        $newData ->is_private = $request->private;

        $date_subhour = Carbon::parse($request->date_activity)->subHour();
        $date_addhour = Carbon::parse($request->date_activity)->addHour();
        $arround_act = Activity::whereBetween('date_activity',[$date_subhour,$date_addhour] )->where('status','enable')->where('organization_id',Auth::user()->profil->organization_id)->get();

        if ($arround_act->count() > 0) {
            # code...
            $newData ->status = 'disable';
            $newData ->save();
            Alert::warning('Konfirmasi', 'Pastikan kegiatan tidak terbentur !');
            return redirect()->route('activity.show', $newData->id);
        }else{
            $newData ->status = 'enable';
            $newData ->save();

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
        $date_subhour = Carbon::parse($act->date_activity)->subHour();
        $date_addhour = Carbon::parse($act->date_activity)->addHour();
        $start_date = Carbon::parse($date_subhour)->toDateTimeString();
        $end_date = Carbon::parse($date_addhour)->toDateTimeString();
        $arround_act = Activity::whereBetween('date_activity',[$date_subhour,$date_addhour] )->where('organization_id',Auth::user()->profil->organization_id)->where('status','enable')->get();
        // dd($date_subhour, $date_addhour,$start_date, $end_date);
        // dd($arround_act->count());
        return view('Admin.Agenda.show', compact('act', 'arround_act'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $act = Activity::find($id);
        return view('Admin.Agenda.edit', compact('act'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request_date = Carbon::parse($request->date_activity)->toDateTimeString();
        // dd($request_date, $request->date_activity);
        $check_date_act = Activity::where('date_activity',$request_date )->whereNot('id',$id)->where('organization_id',Auth::user()->profil->organization_id)->where('status','enable')->first();
        // dd($check_date_act);
        if(!empty($check_date_act)){
            Alert::warning('Gagal', 'Tanggal Kegiatan memiliki waktu yang sama dengan kegiatan '.$check_date_act->name_activity.' yang telah terdaftar pada sistem');
            return  back();
        }

        // dd($request_date);
        $act = Activity::find($id);
        $act->date_activity = $request->date_activity;
        $act->name_activity = $request->name_activity;
        $act->location = $request->location;
        $act->description = $request->description;
        $act->accompanying_officer = $request->accompanying_officer;
        $act->is_private = $request->private;
        $act->save();


        $newLog = new Historyactivity();
        $newLog ->id = Str::uuid();
        $newLog ->activity_id = $id;
        $newLog ->log ='Updated By '.Auth::user()->name;
        $newLog ->save();

        Alert::success('Berhasil', 'Data kegiatan berhasil diperbaharui');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $act = Activity::find($id);
        $act->status = 'disable';
        $act->save();

        $newLog = new Historyactivity();
        $newLog ->id = Str::uuid();
        $newLog ->activity_id = $id;
        $newLog ->log ='Destroy By '.Auth::user()->name;
        $newLog ->save();

        Alert::success('Berhasil', 'Kegiatan ('.$act->name_activity.') berhasil dihapus.');
        return  back();
    }

    public function cancel_activity($id)
    {
        $act = Activity::find($id);
        $act->status_activity = 'cancel';

        $newData = new Historyactivity();
        $newData ->id = Str::uuid();
        $newData ->activity_id = $id;
        $newData ->log =$act->status_activity.' By '.Auth::user()->name;

        if (Auth::user()->name == null) {
            # code...
            Alert::warning('Oops', 'Akses ditolak, silahkan coba lagi nanti.');
            return  back();
        }

        $newData->save();
        $act->save();

        Alert::success('Berhasil', 'Kegiatan ('.$act->name_activity.') berhasil dibatalkan.');
        return  back();
    }

    public function approve_activity(Request $request)
    {

        $request_date = Carbon::parse($request->date_activity)->toDateTimeString();
        // dd($request_date, $request->date_activity);
        $check_date_act = Activity::where('date_activity',$request_date )->where('status','enable')->where('organization_id',Auth::user()->profil->organization_id)->first();
        // dd($check_date_act);
        if(!empty($check_date_act)){
            Alert::warning('Gagal', 'Tanggal Kegiatan memiliki waktu yang sama dengan kegiatan '.$check_date_act->name_activity.' yang telah terdaftar pada sistem');
            return  back();
        }

        $act = Activity::find($request->id);
        $act->status = 'enable';
        $act->save();


        $newLog = new Historyactivity();
        $newLog ->id = Str::uuid();
        $newLog ->activity_id = $request->id;
        $newLog ->log ='Approve By '.Auth::user()->name;
        $newLog ->save();

        Alert::success('Berhasil', 'Kegiatan ('.$act->name_activity.') berhasil didaftarkan.');
        return redirect()->route('activity.index');

    }

    public function detail_activity(string $id)
    {
        $act = Activity::find($id);
        $notes = Notesactivity::with('user','activity','documentation')->where('activity_id',$id)->where('status','enable')->get();
        // dd($act, $notes[0]->documentation);

        if ($act->status == 'disable' OR $act->status_activity == 'cancel' ) {
            # code...
            Alert::warning('Oops', 'Kegiatan telah dihapus, atau telah dibatalkan.');
            return redirect()->route('dashboard.index');
        }
        return view('Operator.Agenda.konfirmasi', compact('act','notes'));

    }

    public function store_notes(Request $request)
    {
        //
        $idact = $request->idactivity;
        $act = Activity::find($idact);

        if ($act->status == 'disable' OR $act->status_activity == 'cancel' ) {
            # code...
            Alert::warning('Oops', 'Kegiatan telah dibatalkan atau dihapus, tidak dapat menambahkan komentar.');
            return redirect()->route('dashboard.index');

        }

        $newData = new Notesactivity();
        $newData ->id = Str::uuid();
        $newData ->activity_id = $idact;
        $newData ->user_id = Auth::user()->id;
        $newData ->notes = $request->notes;

        $request->validate([

            'images' => 'required',

            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',

        ]);
        $images = [];
        if ($request->images){
            foreach($request->images as $key => $image)
            {
                $imageName = time().rand(1,99).'.'.$image->extension();
                $image->move(public_path('images'), $imageName);

                $images[]['name'] = $imageName;
            }
        }

        foreach ($images as $key => $image) {
            // Image::create($image);
            $newImage = new Documentation();
            $newImage ->id = Str::uuid();
            $newImage ->notesactivity_id =   $newData ->id;
            $newImage ->user_id =  Auth::id();
            $newImage ->picture = $image['name'];
            // dd($image['name']);
            $newImage->save();
        }

        $newData->save();

        $act = Activity::find($idact);
        $act->status_activity = 'complete';
        $act->save();

        $newLog = new Historyactivity();
        $newLog ->id = Str::uuid();
        $newLog ->activity_id = $idact;
        $newLog ->log ='Add Note By '.Auth::user()->name;
        $newLog ->save();

        Alert::success('Berhasil', 'Catatan dan Dokumentasi berhasil didaftarkan');
        return redirect()->route('activity.detail',$idact);
    }

    public function deleteNote(string $id)
    {
        $note = Notesactivity::find($id);
        $note->status = 'disable';
        $note->save();

        $doc = Documentation::where('notesactivity_id',$id)->get();

        $newLog = new Historyactivity();
        $newLog ->id = Str::uuid();
        $newLog ->activity_id = $note->activity_id;
        $newLog ->log ='Destroy Comment : '.$note->notes.' By '.Auth::user()->name;
        // dd($newLog->log);
        $newLog ->save();
        // File::delete('images/'.$doc->picture);
        // $doc->delete();

        foreach ($doc as $pic) {
            // Storage::delete("uploaded-images/{$image}");
            File::delete("images/{$pic->picture}");

        }

        Alert::success('Berhasil', 'Komentar ('.$note->notes.') berhasil dihapus.');
        return  back();
    }

    public function search_activity()
    {
        return view('Admin.Agenda.search');

    }

    public function get_activity(Request $request)
    {
        $startDate = Carbon::parse($request->tglawal);
        $endDate = Carbon::parse($request->tglakhir)->addDay();
        $activity = Activity::whereBetween('date_activity',[$startDate,$endDate] )->where('status','enable')->where('organization_id',Auth::user()->profil->organization_id)->reorder('date_activity','asc')->get();
        // dd($act, $notes[0]->documentation);
        return view('Admin.Agenda.index', compact('activity'));

    }


    public function detail_master_activity(string $id)
    {
        $act = Activity::find($id);
        $notes = Notesactivity::with('user','activity','documentation')->where('activity_id',$id)->where('status','enable')->get();
        $logs = Historyactivity::with('activity')->where('activity_id',$id)->reorder('created_at','desc')->limit(10)->get();
        // dd($act, $notes[0]->documentation);

        return view('Admin.Agenda.detail', compact('act','notes','logs'));

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

        $activity = Activity::with('notesactivity')->whereBetween('date_activity',[$startDate,$endDate] )->where('status','enable')->where('status_activity','complete')->where('organization_id',Auth::user()->profil->organization_id)->reorder('date_activity','asc')->get();

        $title = 'Laporan Kegiatan '.Auth::user()->profil->organization->name;
        $subTitle = 'Pada Hari '.$formatstartDate.' s/d '.$formatendDate;
        // return view('Admin.Agenda.pdf', compact('activity','title','subTitle'));

        $pdf = PDF::loadview('Admin.Agenda.pdf', compact('activity','title','subTitle'))->setPaper('legal', 'potrait');
        return $pdf->download($title.'.pdf');

    }

    public function savePdf(String $id)
    {
        $act = Activity::with('notesactivity')->where('status','enable')->where('id',$id)->where('status_activity','complete')->where('organization_id',Auth::user()->profil->organization_id)->first();

        $title = 'Laporan Kegiatan '.Auth::user()->profil->organization->name;
        // return view('Admin.Agenda.single-data-pdf', compact('act','title'));

        $pdf = PDF::loadview('Admin.Agenda.single-data-pdf', compact('act','title'))->setPaper('legal', 'potrait');
        return $pdf->download($title.'.pdf');

    }


    public function timelineActivity()
    {
        return view('Admin.Agenda.timeline-agenda');

    }


    public function downloadTimeline(Request $request)
    {
        $startDate = Carbon::parse($request->tglawal);
        $endDate = Carbon::parse($request->tglakhir)->addDay();
        $formatstartDate = Carbon::parse($request->tglawal)->isoFormat('dddd, D MMMM Y');
        $formatendDate = Carbon::parse($request->tglakhir)->isoFormat('dddd, D MMMM Y');

        $activity = Activity::with('notesactivity')->whereBetween('date_activity',[$startDate,$endDate] )->where('status','enable')->where('status_activity','pending')->where('organization_id',Auth::user()->profil->organization_id)->reorder('date_activity','asc')->get();

        $title = 'Jadwal Kegiatan '.Auth::user()->profil->organization->name;
        $subTitle = 'Pada Hari '.$formatstartDate.' s/d '.$formatendDate;
        // if ($request->private == 'disprivate') {
        //     return view('Admin.Agenda.disprivate-timeline', compact('activity','title','subTitle'));
        // }
        // return view('Admin.Agenda.timeline', compact('activity','title','subTitle'));

        if ($request->private == 'disprivate') {
            $pdf = PDF::loadview('Admin.Agenda.disprivate-timeline', compact('activity','title','subTitle'))->setPaper('legal', 'landscape');
        }else{
            $pdf = PDF::loadview('Admin.Agenda.timeline', compact('activity','title','subTitle'))->setPaper('legal', 'landscape');
        }
        return $pdf->download($title.'.pdf');

    }

}
