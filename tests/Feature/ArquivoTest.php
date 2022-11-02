<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\arquivo;

class ArquivoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        //Verifica se ao tentar inserir dados identicos a como chegam na funcao na tabela principal vai ter exito sem problemas
        $response = $this->get('/');
        $arquivoModel = new arquivo();
        $dadosFicticios = ['tipo_transacao' => 3, 'data' => '24/11/200','valor' => 1,'cpf' => '08694328933','cartao' => '11111111****1111','hora' => '00:00:00','dono_loja' => 'Julius','nome_loja' => 'Julius House'];
        $retorno = $arquivoModel->importaDados($dadosFicticios);

        if($retorno == 'Arquivo importado com sucesso!!'){
            $response->assertStatus(200);
        }else{
            $response->assertStatus(400);
        }
    }
}
