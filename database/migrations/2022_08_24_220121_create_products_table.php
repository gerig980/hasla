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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('added_by')->unsigned()->index();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->integer('size_guide_id')->unsigned()->index();
            $table->longText('collection_id')->nullable();
            $table->mediumText('filter_attribute_id')->nullable();
            $table->longText('up_sell_product_ids')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->nullable();
            $table->text('images')->nullable();
            $table->string('image_ids')->nullable();
            $table->text('thumbnail');
            $table->string('thumbnail_id')->nullable();
            $table->string('video_provider')->nullable();
            $table->string('video_url')->nullable();
            $table->string('colors')->nullable();
            $table->string('attribute_sets')->nullable();
            $table->string('unit')->nullable();
            $table->tinyInteger('has_variant')->default(0);
            $table->mediumText('selected_variants')->nullable();
            $table->mediumText('selected_variants_ids')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->integer('current_stock')->default(0);
            $table->integer('minimum_order_quantity')->default(1);
            $table->tinyInteger('stock_notification')->default(0);
            $table->integer('low_stock_to_notify')->nullable();
            $table->enum('stock_visibility', ['visible_with_quantity', 'visible_with_text'])->default('visible_with_text');
            $table->integer('total_sale')->default(0);
            $table->decimal('special_discount', 10, 2)->nullable();
            $table->enum('special_discount_type', ['flat', 'percentage'])->nullable();
            $table->dateTime('special_discount_start')->nullable();
            $table->dateTime('special_discount_end')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_featured')->default(0);
            $table->tinyInteger('is_refundable')->default(0);
            $table->tinyInteger('todays_deal')->default(0);
            $table->double('rating', 8, 2)->default(0);
            $table->enum('product_status', ['published', 'draft'])->default('published');
            $table->tinyInteger('allow_checkout_when_out_of_stock')->unsigned()->default(0);
            $table->tinyInteger('with_storehouse_management')->unsigned()->default(0);
            $table->tinyInteger('free_shipping')->default(0);
            $table->float('length')->nullable();
            $table->float('wide')->nullable();
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->string('barcode')->nullable();
            $table->integer('tax_id')->unsigned()->nullable();
            $table->string('vat_taxes')->nullable();
            $table->integer('num_of_sale')->nullable();
            $table->bigInteger('viewed')->default(0);
            $table->longText('tags')->nullable();
            $table->mediumText('meta_title')->nullable();
            $table->longText('meta_description')->nullable();  
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
        Schema::dropIfExists('products');
    }
};