<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //'id','service_id','vendor_id','details','location','Rating','created_at','updated_at' 
        Schema::create('service_provider', function (Blueprint $table) {
            
            $table->char('id')->primary();
            $table->char('service_id');
            $table->foreign('service_id')->references('id')->on('service');
            $table->char('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendor');
            $table->char('details');
            $table->char('location');
            $table->float('rating');
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
        Schema::dropIfExists('service_provider');
    }
}
