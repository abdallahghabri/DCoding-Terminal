<?php

class SommeInteractor
{
    private $valeurinitial;

    public function __construct($initialValue)
    {
        $this->initialValue = $initialValue;
    }

    public function somme(array $values): int
    {
        return $this->valeurinitial + array_sum(array_filter($values, 'is_numeric'));
    }
}

