<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Weatherforecast extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weatherforecast', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->unsignedBigInteger('zipcode')->nullable();
            $table->string('weather');
            $table->enum('emergency',[1,2])->default(1); //1-> Problem Yok 2->Acil Durum
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
        Schema::dropIfExists('weatherforecast');
    }
}
