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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->nullable()->constrained('admins')->onDelete('cascade');
            $table->string('name')->unique();
            $table->string('icon')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('client_id')->nullable()->unique();
            $table->string('client_secret')->nullable()->unique();
            $table->tinyInteger('sandbox_mode')->default(0);
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
        Schema::dropIfExists('payment_methods');
    }
};
