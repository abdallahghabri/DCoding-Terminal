<?php

if (php_sapi_name() != 'cli') {
    exit("Ce script ne peut etre execute qu'en ligne de commande.\n");
}

$argType = [];
$values = [];

foreach ($argv as $arg) {
    if ($arg === "-d" || $arg === "-g" || $arg === "-b" || $arg === "-m" || $arg === "-s" || $arg === "-div") {
        $argType[] = $arg;
    } else {
        $values[] = $arg;
    }
}
array_shift($values);
$entites = array_filter($values, 'is_numeric');
$chaines = array_filter($values, function ($value) {
    return !is_numeric($value);
});

foreach ($argType as $argt) {
    if ($argt === '-g') {
        $result = implode(' ', $values);
        printf("Il s'agit d'une liste de chaines:".implode(',', $chaines)."\n");
    }
    if ($argt === "-d") {
        $count = array_sum(array_filter($values, 'is_numeric'));
        $result = implode(' ', $values);
        printf("Il s'agit d'une operation de Somme : %d\n", $count);
    }
    if ($argt === "-m") {
        $multiplication = 1;
        foreach ($entites as $en) {
            $multiplication *= $en;
        }
        printf("Il s'agit d'une operation de Multiplication : %d\n", $multiplication);
    }
    if ($argt === '-s') {
        $result =0;
        $result = $entites[0]-$entites[1]; 
        printf("Il s'agit d'une operation de Soustraction : %d-%d=%d\n", $entites[0],$entites[1],$result);
    }
    if($argt==='-div'){
        $result = 0;
        $result = $entites[0]/$entites[1];
        printf("Il s'agit d'une operation de division : %d/%d=%f\n", $entites[0],$entites[1],$result);
    }
    if($argt==='-b'){
        printf("Presence du flag TRUE)");
    }
}