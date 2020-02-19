<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_carts', function (Blueprint $table) {
            $table->bigIncrements('user_cart_id');
            $table->integer('user_idk');
            $table->integer('product_idk');
            $table->integer('save_later');
            $table->softDeletes();
            $table->string('crated_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('user_carts');
    }
}
