<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postcodes', function (Blueprint $table) {
            $table->string('jis', 5);
            $table->string('old_zip', 5);
            $table->string('zip', 7);
            $table->string('pref_kana', 100);
            $table->string('city_kana', 100);
            $table->string('town_kana', 100);
            $table->string('pref', 100);
            $table->string('city', 100);
            $table->string('town', 100);
            $table->unsignedTinyInteger('comment1');
            $table->unsignedTinyInteger('comment2');
            $table->unsignedTinyInteger('comment3');
            $table->unsignedTinyInteger('comment4');
            $table->unsignedTinyInteger('comment5');
            $table->unsignedTinyInteger('comment6');
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
        Schema::dropIfExists('postcodes');
    }
}
