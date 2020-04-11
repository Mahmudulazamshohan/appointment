<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public $table = 'categories';

    const STATUS_SELECT = [
        '1' => 'Enable',
        '2' => 'Disable',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'amount',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'category_color',
    ];

    public function categoryUsers()
    {
        return $this->hasMany(User::class, 'category_id', 'id');
    }


    public function categorySpecialists()
    {
        return $this->hasMany(Specialist::class, 'category_id', 'id');
    }
}
