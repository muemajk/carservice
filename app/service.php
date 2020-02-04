<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    //
    protected $table="service";

    protected $fillable= ['id','name','type', 'description', 'created_at','update_at'];

    public function serviceprovider(){
        return $this->hasMany("App/Serviceprovider",'service_id');
    }
}
