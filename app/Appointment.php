<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    public $table = 'appointments';

    const EMAIL_REMINDER_SELECT = [
        '1' => 'Yes',
        '2' => 'No',
    ];

    // protected $dates = [
    //     'updated_at',
    //     'created_at',
    //     'deleted_at',
    //     'booking_date',
    // ];

    const STATUS_SELECT = [
        '0' => 'Pending',
        '1' => 'Approved',
        '2' => 'Hold',
        '3' => 'Cancelled',
    ];

    protected $fillable = [
        'booking_date',
        'booking_time',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'customer_id',
        'specialist_id',
    ];


    public function specialist()
    {
        return $this->belongsTo(Specialist::class, 'specialist_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    // public function getBookingDateAttribute($value)
    // {
    //     return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    // }

    // public function setBookingDateAttribute($value)
    // {
    //     $this->attributes['booking_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    // }
}
