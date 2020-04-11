<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Category;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppointmentRequest;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Mail\ReservationApprovedMail;
use App\Specialist;
use App\User;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class AppointmentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('appointment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (Auth::user()->roles[0]->id == 2) {
            $specialistid = Specialist::where('user_id',  Auth::user()->id)->pluck('id')->first();
            $appointments = Appointment::where('specialist_id', $specialistid)->orderBy('created_at', 'DESC')->get();
        }else{
            $appointments = Appointment::orderBy('created_at', 'DESC')->get();
        }
        return view('admin.appointments.index', compact('appointments'));
    }

    public function create()
    {
        abort_if(Gate::denies('appointment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialists = Specialist::with('user')->get()->pluck('user.name','id')->prepend(trans('global.pleaseSelect'), '');

        $customers = Customer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.appointments.create', compact('categories', 'specialists', 'customers'));
    }

    public function store(StoreAppointmentRequest $request)
    {

        $date = Carbon::parse($request->booking_date);
        $specialist_id = $request->specialist_id;
        $booking_date = $date->format('Y-m-d');
        $booking_time = $date->format('H:i:s');
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $status = $request->status;

        $customer = Customer::firstOrCreate(
            ['email' => $email],
            ['phone' => $phone, 'name' => $name]
        );

        $appointment = new Appointment();
        $appointment->booking_date = $booking_date;
        $appointment->booking_time = $booking_time;
        $appointment->status = $status;
        $appointment->specialist_id = $specialist_id;
        $appointment->customer_id = $customer->id;
        $appointment->save();

        return redirect()->route('admin.appointments.index');
    }

    public function edit(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $specialists = Specialist::with('user')->get()->pluck('user.name','id')->prepend(trans('global.pleaseSelect'), '');
        
        $customers = Customer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $appointment->load('specialist', 'customer');

        return view('admin.appointments.edit', compact('categories', 'specialists', 'customers', 'appointment'));
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        //$appointment->update($request->all());
        $date = Carbon::parse($request->booking_date);
        $specialist_id = $request->specialist_id;
        $booking_date = $date->format('Y-m-d');
        $booking_time = $date->format('H:i:s');
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $status = $request->status;

        $customer = Customer::firstOrCreate(
            ['email' => $email],
            ['phone' => $phone, 'name' => $name]
        );

        $appointment->booking_date = $booking_date;
        $appointment->booking_time = $booking_time;
        $appointment->status = $status;
        $appointment->specialist_id = $specialist_id;
        $appointment->customer_id = $customer->id;
        $appointment->save();

        return redirect()->route('admin.appointments.index');
    }

    public function show(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointment->load('specialist', 'customer');

        return view('admin.appointments.show', compact('appointment'));
    }

    public function destroy(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointment->delete();

        return back();
    }

    public function massDestroy(MassDestroyAppointmentRequest $request)
    {
        Appointment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function bookAppointment()
    {

        return $json = File::get(storage_path() . "/json/sample.json");
        $data = json_decode($json);
        return $data;

    }

    public function changeAppointmentStatus(Request $request)
    {
        $senderemail = 'info@dermatopsychologie.cz';
        $sendername = 'Ústav Dermatopsychologie';
        $subject = 'Appointment Information!';

        $appointmentid = $request->appointmentid;
        $status = $request->status;

        $appointment = Appointment::find($appointmentid);
        $appointment->status = $status;
        $appointment->save();
        if ($status == 1) {
            $appointment->with(['customer','specialist.user'])->first();
            $customeremail = $appointment->customer->email;
            $customerename = $appointment->customer->name;
            $specialistname = $appointment->specialist->user->name;
            $date = $appointment->booking_date;
            $time = $appointment->booking_time;
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
            
            //Mail::to($email)->send(new ReservationApprovedMail($data));
            Mail::send('admin.emails.reservation_approved', ['data' => $data], function ($message) use ($data) {
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
        }
        return response()->json(['success' => 'Appointment status changed successfully!']);

    }
}
