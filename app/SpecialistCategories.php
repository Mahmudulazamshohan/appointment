<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialistCategories extends Model
{
    protected $fillable = [
        'specialist_id',
        'category_id'
    ];
    public function specialist(){
        return $this->hasOne(Specialist::class,'id','specialist_id');
    }
    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

}
