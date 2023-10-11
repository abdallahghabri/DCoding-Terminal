<?php

if (php_sapi_name() != 'cli') {
    exit("Ce script ne peut être exécuté qu'en ligne de commande.\n");
}

$argType = null;
$values = [];

foreach ($argv as $arg) {
    if ($arg === '-g' || $arg === '-d' || $arg === '-b') {
        $argType = $arg;
    } else {
        if ($argType) {
            $values[] = $arg;
        } else {
            printf("Argument inconnu : %s\n", $arg);
        }
    }
}

if ($argType === '-g') {
    $result = implode(' ', $values);
    printf("Il s'agit d'une liste de chaînes : %s\n", $result);
} elseif($argType === '-abdallah'){
    printf("entrez votre mdp");
} elseif ($argType === '-d') {
    $result = array_sum($values);
    printf("Il s'agit d'une liste d'entiers, somme : %d\n", $result);
} elseif ($argType === '-b') {
    printf("Il s'agit d'un booléen (TRUE).\n");
} else {
    printf("Aucun argument valide spécifié.\n");
}

