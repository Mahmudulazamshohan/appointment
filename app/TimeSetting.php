<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSetting extends Model
{
    protected $fillable = [
        'time',
        'created_at',
        'updated_at',
    ];
}
