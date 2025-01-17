<?php

namespace App\Http\Controllers;


use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'superadmin') {
            # code...
            return view('dashboard');
        } elseif (Auth::user()->role == 'admin') {
            # code...

            $datenow = Carbon::now();
            $act_complete = Activity::with('organization','user')->where('status','enable')->where('status_activity','complete')->where('organization_id',Auth::user()->profil->organization_id)->whereDate('date_activity',$datenow)->reorder('date_activity','asc')->get();
            $act_pending = Activity::with('organization','user')->where('status','enable')->where('status_activity','pending')->where('organization_id',Auth::user()->profil->organization_id)->whereDate('date_activity',$datenow)->reorder('date_activity','asc')->get();
            $act_count = Activity::with('organization','user')->where('status','enable')->whereNot('status_activity','cancel')->where('organization_id',Auth::user()->profil->organization_id)->whereDate('date_activity',$datenow)->reorder('date_activity','asc')->get();
            $all_act = Activity::with('organization','user')->where('status','enable')->whereNot('status_activity','cancel')->where('organization_id',Auth::user()->profil->organization_id)->reorder('date_activity','asc')->get();

            return view('Admin.dashboard', compact('act_complete','act_pending','act_count','all_act'));

        } else {
            # code...

            $datenow =Carbon::now();
            $today = Activity::with('organization','user')->where('status','enable')->where('organization_id',Auth::user()->profil->organization_id)->whereDate('date_activity',$datenow)->reorder('date_activity','asc')->get();
            $tomorrow = Activity::with('organization','user')->where('status','enable')->where('organization_id',Auth::user()->profil->organization_id)->whereDate('date_activity',$datenow->addDay())->reorder('date_activity','asc')->get();

            return view('Operator.dashboard', compact('today','tomorrow'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
