<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->string('name');
            $table->text('description');
            $table->integer('subcategory_id');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('quantity_in_order')->nullable();
            $table->integer('date_of_expire')->nullable();
            $table->string('images');
            $table->string('notes')->nullable();
            $table->integer('ranking')->default(0);
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
}
