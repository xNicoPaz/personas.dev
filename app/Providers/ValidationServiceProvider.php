<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Validator::extend('alpha_spaces', function ($attribute, $value) {
            return preg_match('/^[\pL\s]+$/u', $value); 
        });

        Validator::extend('alpha_num_spaces', function ($attribute, $value) {
            return preg_match('/[a-zA-Z0-9 ]/u', $value); 
        });

        Validator::extend('dni_or_string', function($attribute, $value, $parameters, $validator){
            $value = strval($value);
            $strMaxLength = $parameters[0];
            $length = strlen($value);

            if(is_numeric($value)){
                if($length === 7 || $length === 8){
                    return true;
                }else{
                    return false;
                }
            }else{
                if(!preg_match('~[0-9]~', $value)){
                    if($length <= $strMaxLength){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
