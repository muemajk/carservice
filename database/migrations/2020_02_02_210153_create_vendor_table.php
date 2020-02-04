<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //id,user,name,phone,location,created_at,updated_at for table client
        Schema::create('vendor', function (Blueprint $table) {       
            $table->char('id', 100)->primary();
            $table->string('user_id')->unique();
            $table->foreign('user_id')->references('id')->on("users");
            $table->char('name',100);
            $table->char('phone',100);
            $table->char('location',100);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor');
    }
}
