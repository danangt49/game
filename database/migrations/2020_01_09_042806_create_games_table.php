<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up(){
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('picture')->nullable();
            $table->text('logo')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('statusgame')->nullable();
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
        Schema::dropIfExists('games');
    }
}
