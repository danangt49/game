<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('match_id');
            $table->integer('user_id');
            $table->string('gameid');
            $table->string('in_game_name',50);
            $table->integer('place')->default('0');
            $table->integer('place_point')->default('0');
            $table->integer('killed')->default('0');
            $table->integer('kill_win')->default('0');
            $table->integer('win_prize')->default('0');
            $table->integer('bonus')->default('0');
            $table->integer('total')->default('0');
            $table->integer('refund')->default('0');
            $table->string('team')->nullable();
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
        Schema::dropIfExists('players');
    }
}
