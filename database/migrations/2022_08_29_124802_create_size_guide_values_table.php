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
        Schema::create('size_guide_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('size_guide_id')->constrained('size_guides')->onDelete('cascade');
            $table->string('size');
            $table->string('country_size_value');
            $table->string('shoulder')->nullable();
            $table->string('length_tops')->nullable();
            $table->string('sleeve_length')->nullable();
            $table->string('bust')->nullable();
            $table->string('length_bottoms')->nullable();
            $table->string('waist_size')->nullable();
            $table->string('hip_size')->nullable();
            $table->string('thigh')->nullable();
            $table->string('crown')->nullable();
            $table->string('shoes_inner_length')->nullable();
            $table->string('platform_length')->nullable();
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
        Schema::dropIfExists('size_guide_values');
    }
};