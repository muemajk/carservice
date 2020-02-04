<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    //this model relates to vendor table in the database.
    protected $table='Vendor';

    protected $fillable = ['id','user_id','name','phone','location','created_at','updated_at'];

    public function serviceprovider(){
        return $this->hasMany("App/Serviceprovider",'vendor_id');
    }
}
