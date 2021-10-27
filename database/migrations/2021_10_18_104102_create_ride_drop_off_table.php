<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRideDropOffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ride_drop_off', function (Blueprint $table) {
            $table->id();
            $table->integer('ride_id');
            $table->string('drop_off')->nullable();
            $table->string('drop_off_latitude')->nullable();
            $table->string('drop_off_longitude')->nullable();
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
        Schema::dropIfExists('ride_drop_off');
    }
}
