<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionTable extends Migration
{
    
    public function up()
    {
        Schema::create('division', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('name', 60);
            $table->timestamps();
            $table->softDeletes();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('division');
    }
}
