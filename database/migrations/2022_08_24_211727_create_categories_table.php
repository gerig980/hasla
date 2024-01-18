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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('banner', 255);
            $table->string('icon', 255)->nullable();
            $table->string('url')->nullable();
            $table->tinyInteger('status')->default(1);  
            $table->float('discount')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->mediumText('meta_description')->nullable();  
            $table->mediumText('meta_keywords')->nullable();
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
        Schema::dropIfExists('categories');
    }
};
