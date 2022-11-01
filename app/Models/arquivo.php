<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class arquivo extends Model
{
    use HasFactory;

    public function importaDados($params){



        $insert = DB::table('arquivos')
                        ->insert(['tipo_transacao' => $params['tipo_transacao'], 'data' => $params['data'],'valor' => $params['valor'],'cpf' => $params['cpf'],'cartao' => $params['cartao'],'hora' => $params['hora'],'dono_loja' => $params['dono_loja'],'nome_loja' => $params['nome_loja']]);

            if($insert){
                return $error[]='Arquivo importado com sucesso!!';
            }
    }
    public function temDados(){
        $select = DB::table('arquivos')
                    ->select('*')
                    ->first()
                    ;
        if($select != null){
            DB::table('arquivos')->truncate();
        }
    }
}
