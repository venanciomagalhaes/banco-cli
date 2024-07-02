<?php

function mostrarSaldo(array $dados):string
{
    $saldo = $dados['saldo'];
    $saldo = number_format($saldo, 2, ',', '.');
    return "Saldo atual: R$ {$saldo}";
}