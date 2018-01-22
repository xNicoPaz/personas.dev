<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
	use SoftDeletes;
    //
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function provinces(){
    	return $this->hasMany(Province::class);
    }
}
