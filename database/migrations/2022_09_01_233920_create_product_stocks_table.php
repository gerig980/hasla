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
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('variant_ids')->nullable();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('sku')->nullable();
            $table->integer('current_stock')->default(0);
            $table->double('price', 8, 2)->nullable();
            $table->mediumText('image')->nullable();
            $table->integer('image_id')->nullable();
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
        Schema::dropIfExists('product_stocks');
    }
};
