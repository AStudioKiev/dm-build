<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('country')->nullable();

            $table->string('image')->nullable();
            $table->string('label')->nullable();
            $table->string('price_list')->nullable();

            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->text('long_description')->nullable();


            $table->integer('parent_id')->unsigned()->nullable();

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
        Schema::dropIfExists('types');
        if (file_exists(public_path() . '/uploads/types'))
            foreach (glob(public_path() . '/uploads/types/*') as $file)
                unlink($file);
    }
}
