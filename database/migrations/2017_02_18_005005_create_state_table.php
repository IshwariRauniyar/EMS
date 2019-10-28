<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateTable extends Migration
{
   
    public function up()
    {
        Schema::create('state', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('country');
            $table->string('name', 60);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('state');
    }
}
