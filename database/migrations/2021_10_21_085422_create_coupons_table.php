<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->integer('quantity')->default(0);
            $table->tinyInteger('is_disposable')->default(1);
            $table->double('discount')->nullable();
            $table->timestamp('expiry_date')->nullable();
            $table->string('unit',8)->default('percent');
            $table->enum('status',['active','expired','deactive']);
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
        Schema::dropIfExists('coupons');
    }
}
