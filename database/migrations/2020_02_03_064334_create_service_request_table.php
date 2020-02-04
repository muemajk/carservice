<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //'client_id','serviceprovider_id','location','created_at','updated_at'
        Schema::create('service_request', function (Blueprint $table) {
            $table->char('id')->primary();
            $table->char('client_id');
            $table->foreign('client_id')->references('id')->on('client');
            $table->char('serviceprovider_id');
            $table->foreign('serviceprovider_id')->references('id')->on('service_provider');
            $table->char('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_request');
    }
}
