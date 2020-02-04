<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceprovider extends Model
{
    //
    protected $table ="Serviceprovider";
    protected $fillable=['id','service_id','vendor_id','details','location','Rating','created_at','updated_at'];
    public function servicerequest(){
        return $this->hasMany('App/Servicerequest','serviceprovider_id');
    }
}
