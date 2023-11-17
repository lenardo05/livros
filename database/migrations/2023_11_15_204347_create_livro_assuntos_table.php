<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivroAssuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livro_assuntos', function (Blueprint $table) {
            $table->unsignedBigInteger('livro_id');
            $table->unsignedBigInteger('assunto_id');
            $table->foreign('livro_id')->references('id')->on('livros')->onDelete('cascade');
            $table->foreign('assunto_id')->references('id')->on('assuntos')->onDelete('cascade');
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
        Schema::dropIfExists('livro_assuntos');
    }
}
