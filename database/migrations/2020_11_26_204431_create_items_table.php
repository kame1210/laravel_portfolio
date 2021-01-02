<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('item_id');
            $table->string('item_name', 100);
            $table->text('detail');
            $table->unsignedDecimal('price', 10, 3);
            $table->string('image', 255);
            $table->unsignedTinyInteger('ctg_id');
            $table->unsignedTinyInteger('subctg_id');
            $table->integer('user_id');
            $table->unsignedTinyInteger('delete_flg')->default(0);
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
        Schema::dropIfExists('items');
    }
}
