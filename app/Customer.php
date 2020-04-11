<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Customer extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'customers';

    const EMAIL_REMINDER_SELECT = [
        '1' => 'yes',
        '2' => 'No',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function customerAppointments()
    {
        return $this->hasMany(Appointment::class, 'customer_id', 'id');
    }
}
