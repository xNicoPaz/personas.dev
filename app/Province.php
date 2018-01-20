<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
	use SoftDeletes;
    //
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function country(){
    	return $this->belongsTo(Country::class);
    }

    public function towns(){
    	return $this->hasMany(Town::class);
    }
}
