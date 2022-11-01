<?php
use Illuminate\Support\Facades\DB;
    $dados_banco = DB::select("SELECT * FROM arquivos
                        INNER JOIN tipos ON arquivos.tipo_transacao=tipos.id
                        ");
    $valor_total = 0;
    $negativo = 0;
    $positivo = 0;
    //dd($dados_banco);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @vite(['resources/scss/dashboard.scss'])
</head>
<body>
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
    <form action="api/uploadArquivo" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-md-6">
                <input type="file" name="file" class="form-control">
            </div>

            <div class="col-md-6">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>

        </div>
    </form>
    <br>
    <br>
    <div class="container">
        <h2>DADOS IMPORTADOS NO SISTEMA </h2>
        <ul class="responsive-table">
          <li class="table-header">
            <div class="col col-1">Tipo Transacao</div>
            <div class="col col-2">Data</div>
            <div class="col col-3">Valor</div>
            <div class="col col-4">Cpf</div>
            <div class="col col-5">Cartao</div>
            <div class="col col-6">Hora</div>
            <div class="col col-7">Dono Loja</div>
            <div class="col col-8">Nome Loja</div>
          </li>

            @foreach ($dados_banco as $dado)
                <li class="table-row">
                <div class="col col-1" data-label="Tipo Transacao"><?= $dado->descricao;?></div>
                <div class="col col-2" data-label="Data"><?= $dado->data;?></div>
                @if ($dado->natureza == 'entrada')
                    <div class="col col-3" data-label="Valor">+ $<?= $dado->valor;?></div>
                @else
                    <div class="col col-3" data-label="Valor">- $<?= $dado->valor;?></div>
                @endif
                <div class="col col-4" data-label="Cpf"><?= $dado->cpf;?></div>
                <div class="col col-5" data-label="Cartao"><?= $dado->cartao;?></div>
                <div class="col col-6" data-label="Hora"><?= $dado->hora;?></div>
                <div class="col col-7" data-label="Dono Loja"><?= $dado->dono_loja;?></div>
                <div class="col col-8" data-label="Nome Loja"><?= $dado->nome_loja;?></div>
                <?php
                    if($dado->natureza == 'entrada'){
                        $positivo = $positivo + $dado->valor;
                        $valor_total = $valor_total + $dado->valor;
                    }else{
                        $negativo = $negativo - $dado->valor;
                        $valor_total = $valor_total - $dado->valor;
                    }

                ?>
                </li>
            @endforeach

          <h3>Valor Total: $<?= $valor_total;?></h3>
          <h4>Soma Positivo: $<?= $positivo;?></h4>
          <h4>Soma Negativo: $<?= $negativo;?></h4>

        </ul>
      </div>
</body>
</html>
