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
        Schema::create('add__products', function (Blueprint $table) {
            $table->id();
            $table->string('id_main_menu');
            $table->string('id_sub_menu');
            $table->string('product_name');
            $table->string('price');
            $table->text('name_details')->nullable();
            $table->text('name_details_more')->nullable();
            $table->string('status_product');
            $table->string('discount')->nullable();
            $table->string('price_discount')->nullable();
            $table->JSON('images')->nullable();
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
        Schema::dropIfExists('add__products');
    }
};
