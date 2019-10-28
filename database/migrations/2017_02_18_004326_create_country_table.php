<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTable extends Migration
{
  
    public function up()
    {
        Schema::create('country', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('country_code', 3);
            $table->string('name', 60);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('country');
    }
}
