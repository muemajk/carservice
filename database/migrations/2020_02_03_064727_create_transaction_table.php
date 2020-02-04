<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //'id','service_request_id','created_at','updated_at'
        Schema::create('transaction', function (Blueprint $table) {
            $table->char('id')->primary();
            $table->char('service_request_id')->unique();
            $table->foreign('service_request_id')->references('id')->on('service_request');
            
            
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
        Schema::dropIfExists('transaction');
    }
}
