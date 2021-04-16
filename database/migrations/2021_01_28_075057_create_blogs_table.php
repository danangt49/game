<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->string('slug');
            $table->string('kategori');
            $table->text('konten')->nullable();
            $table->string('penulis');
            $table->string('caption')->nullable();
            $table->enum('show_penulis', ['false','true'])->default('true');
            $table->enum('publish', ['false','true'])->default('true');
            $table->string('gambar')->nullable();
            $table->text('meta_deskripsi')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->integer('hits')->default(false);
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
        Schema::dropIfExists('blogs');
    }
}
