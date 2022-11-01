<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('descricao');
            $table->string('natureza');
            $table->string('sinal');



        });
        DB::table('tipos')->insert(array('descricao'=>'Debito','natureza'=>'entrada', 'sinal'=>'+'));
        DB::table('tipos')->insert(array('descricao'=>'Boleto','natureza'=>'saida', 'sinal'=>'-'));
        DB::table('tipos')->insert(array('descricao'=>'Financiamento','natureza'=>'saida', 'sinal'=>'-'));
        DB::table('tipos')->insert(array('descricao'=>'Credito','natureza'=>'entrada', 'sinal'=>'+'));
        DB::table('tipos')->insert(array('descricao'=>'Recebimento Emprestimo','natureza'=>'entrada', 'sinal'=>'+'));
        DB::table('tipos')->insert(array('descricao'=>'Vendas','natureza'=>'entrada', 'sinal'=>'+'));
        DB::table('tipos')->insert(array('descricao'=>'Recebimento TED','natureza'=>'entrada', 'sinal'=>'+'));
        DB::table('tipos')->insert(array('descricao'=>'Recebimento DOC','natureza'=>'entrada', 'sinal'=>'+'));
        DB::table('tipos')->insert(array('descricao'=>'Aluguel','natureza'=>'saida', 'sinal'=>'-'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos');
    }
};
