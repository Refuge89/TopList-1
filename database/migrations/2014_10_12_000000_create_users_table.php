<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->integer('role_id')->unsigned();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar',255)->nullable();
            $table->enum('source',['facebook','twitter','gmail'])->nullable();
            $table->integer('source_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            //Foreign Keys
            $table->foreign('role_id')->references('roles')->on('id');
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
}
