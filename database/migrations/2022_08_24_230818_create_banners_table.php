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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->nullable();
            $table->string('image');
            $table->string('link')->nullable();
            $table->string('title')->nullable();
            $table->string('mobile_version')->nullable();
            $table->string('position');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->enum('banner_type', ['col_1', 'col_2'])->default('col_1')->comment('col_1=col-12 and col_2=col-6');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('banners');
    }
};
