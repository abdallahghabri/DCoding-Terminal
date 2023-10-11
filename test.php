<?php

if (php_sapi_name() != 'cli') {
    exit("Ce script ne peut être exécuté qu'en ligne de commande.\n");
}

foreach ($argv as $arg) {

    if ($arg) {
        printf("argument existe.\n");
    }
    if ($arg === '-g') {
        return($foo[1]);
        exit("Il s'agit d'une liste de chaînes.\n");
    } elseif ($arg === '-d') {
        exit("Il s'agit d'une liste d'entiers.\n");
    } elseif ($arg === '-b') {
        exit("Il s'agit d'un booléen (TRUE).\n");
    } else {
        printf("Argument inconnu : %s\n", $arg);
    }
}
