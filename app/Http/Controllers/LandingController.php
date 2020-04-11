<?php

namespace App\Http\Controllers;

use App\AppDefaultSetting;
use App\Appointment;
use App\AvailableDay;
use App\AvailableTime;
use App\Category;
use App\Customer;
use App\DayName;
use App\FrontendSetting;
use App\Landing;
use App\Mail\AppointmentMail;
use App\Reference;
use App\Reservation;
use App\Service;
use App\Specialist;
use App\SpecialistCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $landings = FrontendSetting::all();
        $references = Reference::all();
        $services = Service::all();
        $reservations = Reservation::all();
        $categories = Category::all();
        $appdefault = AppDefaultSetting::first();
        // return $services;
        return view('website.landing',compact('landings','references','services','reservations', 'categories', 'appdefault'));
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
     * @param  \App\Landing  $landing
     * @return \Illuminate\Http\Response
     */
    public function show(Landing $landing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Landing  $landing
     * @return \Illuminate\Http\Response
     */
    public function edit(Landing $landing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Landing  $landing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Landing $landing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Landing  $landing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Landing $landing)
    {
        //
    }

    public function getSpecialist(Request $request)
    {
        $id = $request->id;

        $specialistCategories = SpecialistCategories::with('specialist')->where('category_id', $id)->get();
        $view = view("category-wise-specialists",compact('specialistCategories'))->render();
        return $view;
    }

    public function getSpecialistAvailableDays(Request $request)
    {
        $noOfMonths = AppDefaultSetting::first();
        if ($noOfMonths->no_of_months_for_cal > 0) {
            $nOfM = $noOfMonths->no_of_months_for_cal;
        }else{
            $nOfM = 1;
        }
        $toUpdate=array();
        $specialistid = $request->specialistid;
        $startDate = date('Y-m-d');
        $endDate = date('Y-m-d', strtotime("+".$nOfM." months", strtotime($startDate)));
        $endDate = strtotime($endDate);
        $days = AvailableDay::where('specialist_id', $specialistid)->pluck('day_name_id');
        $count = count($days);
        for ($i=0; $i < $count; $i++) {
            //return $days[$i];
            $toUpdate = array_merge($toUpdate,$this->getDateForSpecificDayBetweenDates($startDate,$endDate,$days[$i]));

        }
        return $toUpdate;
    }

    public function getDateForSpecificDayBetweenDates($startDate,$endDate,$value)
    {
        $days=array('1'=>'Monday','2' => 'Tuesday','3' => 'Wednesday','4'=>'Thursday','5' =>'Friday','6' => 'Saturday','7'=>'Sunday');
        for($i = strtotime($days[$value], strtotime($startDate)); $i <= $endDate; $i = strtotime('+1 week', $i))
        $date_array[]=date('Y-m-d',$i);

        return $date_array;
    }

    public function getSpecialistAvailableTimes(Request $request)
    {
        $date = $request->date;
        $dayid = DayName::where('name', '=', $request->dayname)->pluck('id')->first();
        $specialistid = $request->specialistid;

        $availabledayid = AvailableDay::where('day_name_id', $dayid)->where('specialist_id', $specialistid)->pluck('id')->first();
        $availabletimes = AvailableTime::where('available_day_id', $availabledayid)->get(['available_time']);
        $bookingtimes = Appointment::where('specialist_id', $specialistid)->where('booking_date', '=', $date)->pluck('booking_time')->toArray();
        $specialistcategories = SpecialistCategories::where('specialist_id',$specialistid)->get();

        return view('availabletime', compact(['availabletimes', 'date', 'bookingtimes','specialistcategories']));
    }

    public function appointmentForm(Request $request)
    {
        $specialistid = $request->specialistid;
        $category_id = $request->category_id;
        $date = $request->date;
        $time = $request->time;
        $specialist = Specialist::with(['user', 'category'])->where('id', '=', $specialistid)->first();
        $specialistcategories  =SpecialistCategories::with(['category','specialist'])
            ->where('specialist_id',$specialistid)->where('category_id',$category_id)->first();
        $view = view("appointment-form",compact(['specialist', 'date', 'time','specialistcategories']))->render();
        return $view;
    }

    public function submitAppointmentForm(Request $request)
    {
        DB::beginTransaction();
        try {
            $senderemail = 'info@dermatopsychologie.cz';
            $sendername = 'Ústav Dermatopsychologie';
            $subject = 'Appointment Information!';

            $specialist_id = $request->specialist;
            $specialist = Specialist::with('user')->where('id',$specialist_id)->first();
            $date = $request->date;
            $time = $request->time;
            $name = $request->patient_name;
            $email = $request->patient_email;
            $phone = $request->patient_phone;


            $customer = Customer::firstOrCreate(
                ['email' => $email],
                ['phone' => $phone, 'name' => $name]
            );

            $appointment = new Appointment();
            $appointment->booking_date = $date;
            $appointment->booking_time = $time;
            $appointment->specialist_id = $specialist_id;
            $appointment->customer_id = $customer->id;
            $appointment->save();

            $customeremail = $customer->email;
            $customerename = $customer->name;
            $specialistname = $specialist->user->name;

            $data = [
                        'customeremail' => $customeremail,
                        'customerename' => $customerename,
                        'senderemail' => $senderemail,
                        'sendername' => $sendername,
                        'subject' => $subject,
                        'specialistname' => $specialistname,
                        'booking_date' => $date,
                        'booking_time' => $time,
                    ];

            //Mail::to($email)->send(new AppointmentMail($data));
            Mail::send('admin.emails.just-got-reservation', ['data' => $data], function ($message) use ($data) {
                $message
                    ->to($data['customeremail'], $data['customerename'])
                    ->subject($data['subject'])
                    ->from($data['senderemail'], $data['sendername'])
                    ->replyTo($data['senderemail'], $data['sendername'])
                    ->embedData([
                        'personalizations' => [
                            [
                                'to' => [
                                    'email' => $data['customeremail'],
                                    'name'  => $data['customerename'],
                                ],
                                'substitutions' => [
                                    '-email-' => $data['customeremail'],
                                ],
                            ],
                        ],
                        'categories' => ['user_group1'],
                        'custom_args' => [
                            'user_id' => "123" // Make sure this is a string value
                        ]
                    ], 'sendgrid/x-smtpapi');
            });
            DB::commit();
            return response()->json(['success' => 'Appointment request submitted successfully!']);
        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }
}
