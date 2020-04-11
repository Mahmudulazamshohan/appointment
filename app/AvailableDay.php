<?php

namespace App;

use App\AvailableTime;
use App\DayName;
use Illuminate\Database\Eloquent\Model;

class AvailableDay extends Model
{
    public function dayname()
    {
        return $this->belongsTo(DayName::class, 'day_name_id');
    }

    public function availabletime()
    {
    	return $this->hasMany(AvailableTime::class, 'available_day_id');
    }
}
