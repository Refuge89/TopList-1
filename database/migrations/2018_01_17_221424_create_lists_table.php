<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('title',255)->nullable(false);
            $table->string('description',255)->nullable(false);
            $table->string('cover',255)->nullable(false);
            $table->integer('user_id')->unsigned();
            $table->enum('status',['draft','published']);
            $table->timestamps();
            //Foreign Keys
            $table->foreign('category_id')->references('categories')->on('id');
            $table->foreign('user_id')->referneces('users')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lists');
    }
}
