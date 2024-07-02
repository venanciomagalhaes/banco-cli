<?php

function depositar(array $dados, float $valor):string
{
    $dados['saldo'] += $valor;
    file_put_contents(__DIR__ . "/../dados.json", json_encode($dados));
    global $dados;
    $dados = json_decode(file_get_contents(__DIR__ . "/../dados.json"), true);
    $valor = number_format($valor, 2, ',', '');
    return "Depósito de R$ {$valor} realizado com sucesso!";
}