<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_models', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('email',255);
            $table->string('address',255);
            $table->date('dob',255);
            $table->integer('status');
            $table->string('education',255);
            $table->string('pincode',255);
            $table->string('profile_pic',255);
            $table->integer('country_id');
            $table->integer('city_id');
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
        Schema::dropIfExists('profile_models');
    }
}
