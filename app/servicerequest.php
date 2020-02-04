<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicerequest extends Model
{
    //the table variable indicates the table affected on the database.
    protected $table = "Servicerequest";
    protected $fillable=['id','client_id','serviceprovider_id','location','created_at','updated_at'];
    
    public function transactions(){
        return $this->hasOne('App/Servicerequest','service_request_id');
    }
}
