<?php

require_once 'C:/Users/ab.gharbi/Documents/perso/terminal/DCoding-Terminal/src/Infrastructure/UseCase/Somme/SommeInteractor.php';
require_once 'C:/Users/ab.gharbi/Documents/perso/terminal/DCoding-Terminal/src/Infrastructure/UseCase/Groupement/GroupementInteractor.php';
require_once 'C:\Users\ab.gharbi\Documents\perso\terminal\DCoding-Terminal\src\Infrastructure\UseCase\Flag\FlagInteractor';

require_once 'C:/Users/ab.gharbi/Documents/perso/terminal/DCoding-Terminal/src/Infrastructure/UseCase/KataFactory.php';

if (php_sapi_name() != 'cli') {
    exit("Ce script ne peut être exécuté qu'en ligne de commande.\n");
}

const ARG_GROUPEMENT = '-g';
const SOMME = '-d';
const ARG_BOOLEAN = '-b';

$argType = null;
$values = [];
$operationTypes = [];

foreach ($argv as $arg) {
    if ($arg == ARG_GROUPEMENT) {
        $argType = ARG_GROUPEMENT;
        $operationTypes[] = ARG_GROUPEMENT;
    } elseif ($arg == SOMME) {
        $argType = SOMME;
        $operationTypes[] = SOMME;
    } elseif ($arg == ARG_BOOLEAN) {
        $operationTypes[] = ARG_BOOLEAN;
    } else {
        if ($argType) {
            $values[$argType][] = $arg;
        }
    }
}

$kataFactory = new KataFactory();
$flagActive = in_array(ARG_BOOLEAN, $operationTypes);

if ($flagActive) {
    printf("Le flag boolean était ACTIF.\n");
} else {
    printf("Le flag boolean était INACTIF.\n");
}

$interactors = $kataFactory->getInteractor($operationTypes, $values[SOMME] ?? []);

foreach ($interactors as $interactor) {
    if (in_array(SOMME, $operationTypes) && $interactor instanceof SommeInteractor) {
        $result = $interactor->somme($values[SOMME]);
        printf("Il s'agit d'une somme : %d\n", $result);
    }

    if (in_array(ARG_GROUPEMENT, $operationTypes) && $interactor instanceof GroupementInteractor) {
        $groupementValues = [];
        foreach ($values[ARG_GROUPEMENT] as $value) {
            if (strpos($value, ' ') !== false) {
                $groupementValues = array_merge($groupementValues, explode(' ', $value));
            } else {
                $groupementValues[] = $value;
            }
        }
        if (is_array($groupementValues) && count($groupementValues) > 0) {
            printf("Il s'agit d'une liste de chaînes avec %d caractères : %s\n", count($groupementValues), implode(' ', $groupementValues));
        } else {
            printf("Il s'agit d'une liste de chaînes : Aucune chaîne fournie.\n");
        }
    }
}