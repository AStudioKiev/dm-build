<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->string('short_description');
            $table->string('code')->nullable();
            $table->string('colors')->nullable();
            $table->float('price');
            $table->integer('type')->unsigned();
            $table->integer('subtype')->unsigned();

            $table->foreign('type')->references('id')->on('types');
            $table->foreign('subtype')->references('id')->on('types');

            $table->timestamps();
            $table->softDeletes();
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
