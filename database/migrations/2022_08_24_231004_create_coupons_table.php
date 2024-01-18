<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->longText('product_id')->nullable();
            $table->string('title');
            $table->string('type');
            $table->string('code');
            $table->string('banner')->nullable();
            $table->integer('discount');
            $table->string('discount_type');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->string('minimum_shopping')->default(1);
            $table->string('maximum_discount')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('db_status')->default(1);
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
};
