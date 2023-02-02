<?php

    require_once __DIR__.'/balanced.php';

    use Balanced\Str\BalancedStr;

    $string = $argv[1] ?? '';
    $balanced = new BalancedStr($string);

    if ($balanced->brackets()) {
        echo "A string '{$string}' é VÁLIDA!";
    } else {
        echo "A string '{$string}' é INVÁLIDA!";
    }