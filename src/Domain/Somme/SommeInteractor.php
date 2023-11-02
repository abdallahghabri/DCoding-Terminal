<?php
namespace App\Domain\Somme;

class SommeInteractor
{
    public function somme(array $values): string
    {
        $result = "c'est une opération de somme : ".array_sum($values); 
        return $result;
    }
}

