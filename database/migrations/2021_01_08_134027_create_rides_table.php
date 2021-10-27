<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('driver_id');
            $table->integer('cancell_by')->nullable();
            $table->integer('fare')->nullable();
            $table->integer('penality')->nullable();
            $table->enum('type', ['take_ride_now', 'schedule_a_ride'])->nullable();
            $table->enum('ride_type', ['shared', 'private'])->nullable();
            $table->enum('car_class', ['SUV', 'VAN'])->nullable();
            $table->string('pick_up')->nullable();
            $table->string('drop_off')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('wheel_chair')->nullable();
            $table->string('no_of_passenger')->nullable();
            $table->string('small_luggage_bags')->nullable();
            $table->string('large_luggage_bags')->nullable();
            $table->time('accepted_at');
            $table->time('arrived_at');
            $table->time('start_at');
            $table->time('cancell_at');
            $table->time('completed_at');
            $table->enum('status', ['accepted','started','arrived','completed','cancelled','pending'])->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('rides');
    }
}
