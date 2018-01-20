<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
	use SoftDeletes;
    //
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function town(){
    	return $this->belongsTo(Town::class);
    }
}
