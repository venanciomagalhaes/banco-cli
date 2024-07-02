<?php

$dados = json_decode(file_get_contents(__DIR__ . '/../dados.json'), true);
$topo = "
    Bem vindo ao Banco CLI
    Titular: ". mostrarTitular($dados) . "
    ". mostrarSaldo($dados) ."
";

