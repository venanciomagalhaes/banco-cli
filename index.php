<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'includes' .  DIRECTORY_SEPARATOR . 'cores.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'mostrarTitular.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'mostrarSaldo.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'depositar.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'sacar.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'includes' .  DIRECTORY_SEPARATOR . 'topo.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'includes' .  DIRECTORY_SEPARATOR . 'opcoes.php';

echo $topo;
do{
    echo $opcoes;
    echo "\n    Digite o valor da opção {$corAmarela}(digite apenas o número do procedimento){$reset}: ";
    $userOption = fgets(STDIN);
    if(is_numeric($userOption)){
        $userOption = (int)$userOption;
    }
    $valorDeposito = 0;
    if($userOption === 2){
        echo "\n    Digite o valor do depósito {$corAmarela}(somente números){$reset}: ";
        $valorDeposito =  fgets(STDIN);
        if(is_numeric($valorDeposito)){
            $valorDeposito = (float) $valorDeposito;
        }else{
            $userOption = "invalido";
        }
        if($valorDeposito < 0){
            $userOption = "deposito-negativo";
        }
    }
    $valorSaque = 0;
    if($userOption === 3){
        echo "\n    Digite o valor do saque {$corAmarela}(somente números){$reset}: ";
        $valorSaque = fgets(STDIN);
        if(is_numeric($valorSaque)){
            $valorSaque = (float) $valorSaque;
        }else{
            $userOption = "invalido";
        }
        if($valorSaque < 0){
            $userOption = "saque-negativo";
        }
        if($valorSaque > $dados['saldo']){
            $userOption = "saque-maior";
        }

    }

    $result = match ($userOption){
        1 => mostrarSaldo($dados) . PHP_EOL,
        2 => depositar($dados, $valorDeposito) . PHP_EOL,
        3 => sacar($dados, $valorSaque) . PHP_EOL,
        "deposito-negativo" => "{$corVermelha}Depósito não realizado devido valor negativo informado $reset" . PHP_EOL,
        "saque-negativo" => "{$corVermelha}Saque não realizado devido valor negativo informado $reset" . PHP_EOL,
        "saque-maior" =>  "{$corVermelha}Saque não realizado devido ausência de valor$reset" . PHP_EOL,
        4 => "{$corVerde}Até mais!{$reset}". PHP_EOL,
        default => "{$corVermelha}Opção inválida. $reset" . PHP_EOL,
    };
    echo "$corVerde    $result $reset";
    echo "   ---------------------------------------" . PHP_EOL;
    sleep(2);
}while($userOption != 4);
