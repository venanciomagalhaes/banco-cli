<?php

$dados = json_decode(file_get_contents(__DIR__ . '/../dados.json'), true);
$topo = "
    {$corAmarela}Bem vindo ao Banco CLI{$reset}

    Titular: ". mostrarTitular($dados) . "
    ". mostrarSaldo($dados) ."
";

