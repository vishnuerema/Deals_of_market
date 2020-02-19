<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('home_products', function (Blueprint $table) {
            $table->bigIncrements('home_product_id');
            $table->integer('user_idk')->nullable();
            $table->integer('user_role_idk')->nullable();
            $table->integer('price_range_idk')->nullable();
            $table->integer('template_config_idk')->nullable();
            $table->string('home_product_name')->nullable();
            $table->string('home_product_slug')->nullable();
            $table->string('home_product_brand_name')->nullable();
            $table->longText('home_product_amount')->nullable();
            $table->longText('home_product_gst')->nullable();
            $table->string('home_product_keywords')->nullable();
            $table->longText('home_product_images')->nullable();
            $table->longText('home_product_specification')->nullable();
            $table->longText('home_product_description')->nullable();
            $table->longText('home_product_attributes')->nullable();
            $table->string('home_product_manufacturer')->nullable();
            $table->longText('home_products_highlights')->nullable();
            $table->longText('home_product_category')->nullable();
            $table->string('home_product_number')->nullable();
            $table->integer('home_product_available_stock')->nullable();
            $table->integer('home_product_view')->nullable();
            $table->longText('home_product_payment_method')->nullable();
            $table->integer('home_product_approval_status')->default(0);
            $table->integer('home_product_deal_of_the_day')->default(0);
            $table->string('home_product_created_by')->nullable();
            $table->string('home_product_updated_by')->nullable();
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
        Schema::dropIfExists('home_products');
    }
}

["../images/clock.jpg", "../images/redmi8a.jpg", "../images/saree.jpg", "../images/shoe1.jpg", "../images/toy1.jpg"]