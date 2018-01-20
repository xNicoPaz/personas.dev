<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Town extends Model
{
	use SoftDeletes;
    //
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function province(){
    	return $this->belongsTo(Province::class);
    }

    public function people(){
    	return $this->hasMany(Person::class);
    }
}
