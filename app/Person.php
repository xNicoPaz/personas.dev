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

    public static function base64Picture($pictureFile){
        $mime = $pictureFile->getMimeType();
        $base64Data = base64_encode(file_get_contents($pictureFile->getRealPath()));
        
        return "data:" . $mime . "; base64, " . $base64Data;
    }
}
