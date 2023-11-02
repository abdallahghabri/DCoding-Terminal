<?php

namespace App\Domain;

use App\Domain\Groupement\GroupementInteractor;
use App\Domain\Somme\SommeInteractor;

class KataFactory
{
    private $operationTypes = [];
    private $sumValues = [];
    private $groupementValues = [];
    private $flagChecker = false;

    public function loadArgumentsAndValues($argv): array
    {
        foreach ($argv as $arg) {
            if ($arg === '-d') {
                $this->operationTypes[] = 'sum';
            } elseif ($arg === '-g') {
                $this->operationTypes[] = 'groupement';
            } elseif ($arg === '-b') {
                $this->flagChecker = true;
            } else {
                if (end($this->operationTypes) === 'sum') {
                    $this->sumValues[] = $arg;
                } elseif (end($this->operationTypes) === 'groupement') {
                    $this->groupementValues[] = $arg;
                }
            }
        }

        return [
            'flagPresence' => $this->flagChecker,
            'operationTypes' => $this->operationTypes,
            'sumValues' => $this->sumValues,
            'groupementValues' => $this->groupementValues,
        ];
    }

    public function getInteractor($values)
    {
        $interactors = [
            'groupementValues' => [],
            'sumValues' => [],
        ];

        foreach ($this->operationTypes as $operationType) {
            if ($operationType === 'groupement') {
                $groupementInteractor = new GroupementInteractor();
                $result = $groupementInteractor->groupement($values['groupementValues']);
                $interactors['groupementValues'] = $result;
            } elseif ($operationType === 'sum') {
                $sumInteractor = new SommeInteractor();
                $result = $sumInteractor->somme($values['sumValues']);
                $interactors['sumValues'] = $result;
            }
        }

        $interactors['flagChecker'] = $this->flagChecker;
        return $interactors;
    }
}

