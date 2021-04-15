<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('game_id')->nullable();
            $table->string('slug');
            $table->text('room')->nullable();
            $table->text('room_password')->nullable();
            $table->string('match_name')->nullable();   
            $table->longtext('description')->nullable();   
            $table->date('match_schedule')->nullable();
            $table->string('kill')->nullable();
            $table->string('fee')->nullable();
            $table->string('maps')->nullable();
            $table->string('players')->nullable();
            $table->text('link')->nullable();
            $table->string('prize')->nullable();
            $table->enum('team', ['SOLO', 'DUO', 'SQUAD'])->nullable();
            $table->enum('match_type', ['Free', 'Paid'])->nullable();
            $table->enum('mode', ['TPP', 'FPP'])->nullable();
            $table->string('status')->nullable();
            $table->text('picture')->nullable();
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
        Schema::dropIfExists('matches');
    }
}
