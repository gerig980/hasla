<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('orders', function (Blueprint $table) {
            $table->float('weight')->nullable()->after('order_from');
            $table->integer('pieces')->nullable()->after('order_from');
            $table->bigInteger('deliver_order_id')->nullable()->after('order_from');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['weight', 'pieces', 'deliver_order_id']);
        });
    }
};
