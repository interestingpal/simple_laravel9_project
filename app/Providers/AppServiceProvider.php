<?php

namespace App\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationData;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
            custom validator to check if email/phone is present at login
        */
        Validator::extend('empty_if', function($attribute, $value, $parameters, $validator) {

            $fields = $validator->getData(); //data passed to your validator
        
            foreach($parameters as $param) {
                $excludeValue = Arr::get($fields, $param, false);
        
                if($excludeValue) { //if exclude value is present validation not passed
                    return false;
                }
            }
        
            return true;
        });
    }
}
