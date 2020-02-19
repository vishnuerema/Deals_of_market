<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_adds', function (Blueprint $table) {
            $table->bigIncrements('product_add_id');
            $table->integer('user_idk')->nullable();
            $table->string('product_add_category')->nullable();
            $table->longText('product_add_images')->nullable();
            $table->longText('product_add_status')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('product_adds');
    }
}
