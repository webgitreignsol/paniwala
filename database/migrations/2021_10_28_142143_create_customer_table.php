<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('security_deposit');
            $table->text('address');
            $table->string('phone');
            $table->string('area');
            $table->string('days');
            $table->string('required_bottle')->nullable();
            $table->string('opening_bottle')->nullable();
            $table->string('opening_balance')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('customer');
    }
}
