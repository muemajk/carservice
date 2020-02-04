<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    //
    protected $table="admin";

    protected $fillable = ['id','user_id','name','phone','location','created_at','updated_at'];

    
}
