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
            $table->string('name_desc')->nullable();
            $table->string('image');
            $table->string('short_description');
            $table->text('description')->nullable();
            $table->mediumText('long_description')->nullable();
            $table->string('video_url')->nullable();
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
        if (file_exists(public_path() . '/uploads/products'))
            foreach (glob(public_path() . '/uploads/products/*') as $file)
                unlink($file);
    }
}
