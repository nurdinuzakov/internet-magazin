<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchendiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchendise', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->text('product_description');
            $table->integer('category_id');
            $table->integer('product_quantity');
            $table->integer('product_price');
            $table->integer('available_size');
            $table->string('available_colors');
            $table->integer('discount');
            $table->integer('quantity_in_order');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('supplier_id')->references('id')->on('suppliers');
            $table->integer('QR_code');
            $table->integer('date_of_expire');
            $table->string('product_image');
            $table->string('notes')->nullable();
            $table->integer('ranking');
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
        Schema::dropIfExists('merchendise');
    }
}
