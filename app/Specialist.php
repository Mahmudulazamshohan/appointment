<?php

namespace App;

use App\AvailableDay;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Specialist extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'specialists';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const AVAILABILITY_SELECT = [
        '1' => 'On Duty',
        '2' => 'Vacation',
    ];


    const SPECIFIC_DAY_SELECT = [
        '1' => 'Monday',
        '2' => 'Tuesday',
        '3' => 'Wednesday',
        '4' => 'Thursday',
        '5' => 'Friday',
        '6' => 'Saturday',
        '7' => 'Sunday',
    ];

    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
        'opening_time',
        'closing_time',
        'availability',
        'user_id',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function availabledays()
    {
        return $this->hasMany(AvailableDay::class, 'specialist_id');
    }
    public function speciallistcategories(){
        return $this->hasMany(SpecialistCategories::class,'specialist_id');
    }

}
