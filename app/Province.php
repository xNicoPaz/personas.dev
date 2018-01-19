<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
	use SoftDeletes;
    //
    protected $dates = ['deleted_at'];
    protected $guarded = [];
}
