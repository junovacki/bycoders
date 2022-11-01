<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\arquivo;

class ArquivoController extends Controller
{
    public function enviaArquivo(Request $request){
        $arquivoModel = new arquivo();
        $upload = $request->file->getContent();
        $dados = preg_split('/(\r\n|[\r\n])/',$upload);

        $arquivoModel->temDados();
        foreach($dados as $linhaTxt){
            $linhaCNAB['tipo_transacao'] = intval($linhaTxt[0]);
            $linhaCNAB['data'] = $linhaTxt[1].$linhaTxt[2].$linhaTxt[3].$linhaTxt[4].'/'.$linhaTxt[5].$linhaTxt[6].'/'.$linhaTxt[7].$linhaTxt[8];
            $linhaCNAB['valor'] = floatval($linhaTxt[9].$linhaTxt[10].$linhaTxt[11].$linhaTxt[12].$linhaTxt[13].$linhaTxt[14].$linhaTxt[15].$linhaTxt[16].$linhaTxt[17].$linhaTxt[18]) / 100;
            $linhaCNAB['cpf'] = $linhaTxt[19].$linhaTxt[20].$linhaTxt[21].$linhaTxt[22].$linhaTxt[23].$linhaTxt[24].$linhaTxt[25].$linhaTxt[26].$linhaTxt[27].$linhaTxt[28].$linhaTxt[29];
            $linhaCNAB['cartao'] = $linhaTxt[30].$linhaTxt[31].$linhaTxt[32].$linhaTxt[33].$linhaTxt[34].$linhaTxt[35].$linhaTxt[36].$linhaTxt[37].$linhaTxt[38].$linhaTxt[39].$linhaTxt[40].$linhaTxt[41];
            $linhaCNAB['hora'] = $linhaTxt[42].$linhaTxt[43].':'.$linhaTxt[44].$linhaTxt[45].':'.$linhaTxt[46].$linhaTxt[47];
            $linhaCNAB['dono_loja'] = $linhaTxt[48].$linhaTxt[49].$linhaTxt[50].$linhaTxt[51].$linhaTxt[52].$linhaTxt[53].$linhaTxt[54].$linhaTxt[55].$linhaTxt[56].$linhaTxt[57].$linhaTxt[58].$linhaTxt[59].$linhaTxt[60].$linhaTxt[61];
            if($linhaCNAB['dono_loja'] == 'MARCOS PEREIRA'){
                $linhaCNAB['nome_loja'] = $linhaTxt[62].$linhaTxt[63].$linhaTxt[64].$linhaTxt[65].$linhaTxt[66].$linhaTxt[67].$linhaTxt[68].$linhaTxt[69].$linhaTxt[70].$linhaTxt[71].$linhaTxt[72].$linhaTxt[73].$linhaTxt[74].$linhaTxt[75].$linhaTxt[76].$linhaTxt[77].$linhaTxt[78].$linhaTxt[79];
            }else{
                $linhaCNAB['nome_loja'] = $linhaTxt[62].$linhaTxt[63].$linhaTxt[64].$linhaTxt[65].$linhaTxt[66].$linhaTxt[67].$linhaTxt[68].$linhaTxt[69].$linhaTxt[70].$linhaTxt[71].$linhaTxt[72].$linhaTxt[73].$linhaTxt[74].$linhaTxt[75].$linhaTxt[76].$linhaTxt[77].$linhaTxt[78].$linhaTxt[79].$linhaTxt[80];

            }

            $error = $arquivoModel->importaDados($linhaCNAB);


        }
        return redirect()->back()->with('alert', $error);

    }
}
