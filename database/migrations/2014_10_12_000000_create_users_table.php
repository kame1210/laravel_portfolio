<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('password');
            $table->string('family_name', 20);
            $table->string('first_name', 20);
            $table->string('family_name_kana', 20)->nullable();
            $table->string('first_name_kana', 20)->nullable();
            $table->unsignedTinyInteger('sex');
            $table->string('year', 4);
            $table->string('month', 2);
            $table->string('day', 2);
            $table->string('zip', 7);
            $table->string('address1', 100);
            $table->string('address2', 100)->nullable();
            $table->string('email', 255)->unique();
            $table->string('tel', 18);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }

    // public function up()
    // {
    //     Schema::create('users', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('name');
    //         $table->string('email')->unique();
    //         $table->timestamp('email_verified_at')->nullable();
    //         $table->string('password');
    //         $table->rememberToken();
    //         $table->timestamps();
    //     });
    // }
}
