<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    //
    protected $table = "Transaction";
    protected $fillable = ['id','service_request_id','created_at','updated_at'];

     
}