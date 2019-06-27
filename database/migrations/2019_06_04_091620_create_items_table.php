<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->text('name');
            $table->increments('id');
            $table->integer('price');
            $table->integer('stock');
            $table->text('brand');
            $table->longText('description');
            $table->text('slug');
            $table->integer('seller_id');
            $table->text('categories');
            $table->integer('status');
            $table->integer('isEnabled');
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
        Schema::drop('items');
    }
}
