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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('admin_id')->nullable()->constrained('admins')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->longText('variation')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->double('tax', 10, 2)->nullable()->default(0);
            $table->double('shipping_cost', 20, 2)->default(0);
            $table->integer('quantity');
            //$table->string('payment_status')->default('unpaid');
            $table->string('delivery_status')->nullable();
            $table->string('shipping_type')->nullable();
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
        Schema::dropIfExists('order_details');
    }
};
