<?php

namespace App\Http\Controllers\Admin;

use App\AppDefaultSetting;
use App\Http\Controllers\Controller;
use App\TimeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AppDefaultSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timesettings = TimeSetting::orderBy('time', 'ASC')->get();
        
        return view('admin.appdefault.index', compact('timesettings'));
    }

    public function getAppDefaultSettings()
    {
        $appdefault = AppDefaultSetting::first();
        return Response::json($appdefault);
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
        $appdefault = AppDefaultSetting::find($id);
        $appdefault->no_of_months_for_cal = $request->number_of_month;
        $appdefault->save();
        return Response::json(['success' => "Your changes successfully saved!"]);
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
