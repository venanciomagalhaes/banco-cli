<?php

function mostrarSaldo(array $dados):string
{
    global $corVerde;
    global $reset;
    $saldo = $dados['saldo'];
    $saldo = number_format($saldo, 2, ',', '.');
    return "Saldo atual:{$corVerde} R$ {$saldo}{$reset}";
}