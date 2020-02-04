<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    //
    protected $table="Client";

    protected $fillable = ['id','user_id','name','phone','location','created_at','updated_at'];

    public function servicerequest(){
        return $this->hasMany('App/Servicerequest','client_id');
    }
}
