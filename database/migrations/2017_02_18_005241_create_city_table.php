<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityTable extends Migration
{
   
    public function up()
    {
        Schema::create('city', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('state');
            $table->string('name', 60);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('city');
    }
}
