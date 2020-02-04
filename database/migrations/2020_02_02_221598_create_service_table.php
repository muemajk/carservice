<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //'id','name','type', 'description', 'created_at','update_at'
        Schema::create('service', function (Blueprint $table) {
            $table->char('id')->primary();
            $table->char('name');
            $table->char('type');
            $table->char('description');
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
        Schema::dropIfExists('service');
    }
}
