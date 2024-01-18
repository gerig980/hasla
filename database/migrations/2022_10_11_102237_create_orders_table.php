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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('admin_id')->nullable()->constrained('admins')->onDelete('cascade');
            $table->string('order_code');
            $table->string('name');
            $table->string('address');
            $table->string('address_two')->nullable();
            $table->integer('city_id');
            $table->integer('country_id');
            $table->string('zipcode');
            $table->string('mobile');
            $table->string('email');
            $table->float('shipping_charges');
            $table->string('coupon_code')->nullable();
            $table->float('coupon_amount')->nullable();
            $table->boolean('payment_status')->default(0);
            $table->integer('payment_method_id')->unsigned()->index();
            $table->integer('order_status_id')->unsigned()->index()->default(1);
            $table->string('payment_gateaway')->nullable();
            $table->float('grant_total');
            $table->enum('order_from',['Web','Facebook','Instagram','Whatsapp'])->default('Web');
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
        Schema::dropIfExists('orders');
    }
};
