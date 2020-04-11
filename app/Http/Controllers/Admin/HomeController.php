<?php

namespace App\Http\Controllers\Admin;

use App\AppDefaultSetting;
use App\Appointment;
use App\AvailableDay;
use App\AvailableTime;
use App\Specialist;
use App\TimeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index()
    {
        
    	$appdefault = AppDefaultSetting::first();
    	$times = TimeSetting::orderBy('time', 'ASC')->get();
        return view('home', compact('appdefault', 'times'));
    }

    public function specialistAvailableTimesAjax(Request $request)
    {
    	$specialistid = $request->specialistid;
    	$availabledays = AvailableDay::where('specialist_id', $specialistid)->with(['dayname', 'availabletime'])->get();
    	$view = view('admin.specialists.individual-specialist-times', compact('availabledays'))->render();
    	return $view;
    }

    public function saveSpecialistAvailableTimesAjax(Request $request)
    {
    	if ($request->available_times) {
    	    $availableDayId = $request->availabledayid;
    	    foreach ($request->available_times as $key => $value) {
    	        $availabletime = new AvailableTime();
    	        $availabletime->available_time = $value;
    	        $availabletime->available_day_id = $availableDayId;
    	        $availabletime->save();
    	    }

    	    $availableDay = AvailableDay::find($availableDayId);
    	    $availableDay->status = 1;
    	    $availableDay->save();

    	    return response()->json(['success' => "Data saved Successfully!"]);
    	}
    }
    public function updateSpecialistAvailableTimesAjax(Request $request)
    {
    	if ($request->available_times_edit) {
    	    $availableDayId = $request->availabledayidedit;
    	    AvailableTime::where('available_day_id', $availableDayId)->delete();
    	    foreach ($request->available_times_edit as $key => $value) {
    	        $availabletime = new AvailableTime();
    	        $availabletime->available_time = $value;
    	        $availabletime->available_day_id = $availableDayId;
    	        $availabletime->save();
    	    }

    	    return response()->json(['success' => "Data saved Successfully!"]);
    	}
    }

    public function markedAsOccupied(Request $request)
    {
    	$date = $request->date;
    	$time = $request->time;
    	$specialistid = Specialist::where('user_id', Auth::user()->id)->pluck('id')->first();
    	if ($specialistid) {
    		$appointment = new Appointment();
    		$appointment->booking_date = $date;
    		$appointment->booking_time = $time;
    		$appointment->status = 5;//5for occupied
    		$appointment->specialist_id = $specialistid;
    		$appointment->save();
    		return response()->json(['success' => "You marked this time as occupied!"]);
    	}
    }
}