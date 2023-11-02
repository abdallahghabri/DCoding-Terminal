<?php
use App\Domain\Groupement\GroupementInteractor;
use App\Domain\KataFactory;
$rootpath = dirname(__DIR__,3);
require_once implode(DIRECTORY_SEPARATOR, [
    $rootpath,
    'vendor',
    'autoload.php'
]
);
$kataFactory = new KataFactory();
$groupementInteractor = new GroupementInteractor();
$argv = $GLOBALS['argv'];

// $result = $kataFactory->loadArgumentsAndValues($argv);
// $sumValues = $kataFactory->getSumValues($argv);
// $groupementValues = $kataFactory->getGoupementValues($argv);
// $flagChecker = $kataFactory->checkFlag($argv);
// $values = $kataFactory->getValues($argv);
$values = $kataFactory->getInteractor($argv);

var_dump($values);