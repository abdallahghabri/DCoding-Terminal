<?php

if (php_sapi_name() != 'cli') {
    exit("Ce script ne peut être exécuté qu'en ligne de commande.\n");
}

use App\Domain\KataFactory;

$rootpath = dirname(__DIR__, 1);
require_once implode(DIRECTORY_SEPARATOR, [$rootpath, 'vendor', 'autoload.php']);

$kataFactory = new KataFactory();
$values = $kataFactory->loadArgumentsAndValues($argv);
$interactors = $kataFactory->getInteractor($values);

foreach ($interactors as $key => $value) {
    echo ucfirst($key) . ': ';

    if ($key === 'flagChecker') {
        echo ($value === true) ? 'ACTIF' : 'INACTIF';
    } else {
        echo $value;
    }

    echo PHP_EOL;
}
