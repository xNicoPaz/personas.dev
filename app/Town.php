<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
	use SoftDeletes;
    //
    protected $dates = ['deleted_at'];
    protected $guarded = [];
}
