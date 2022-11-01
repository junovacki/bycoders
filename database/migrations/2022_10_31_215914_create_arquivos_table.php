<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arquivos', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('tipo_transacao');
            $table->string('data');
            $table->string('valor');
            $table->string('cpf');
            $table->string('cartao');
            $table->string('hora');
            $table->string('dono_loja');
            $table->string('nome_loja');

            $table->foreign('tipo_transacao')->references('id')->on('tipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arquivos');
    }
};
