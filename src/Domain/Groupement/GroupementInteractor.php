<?php
namespace App\Domain\Groupement;

class GroupementInteractor
{
    public function groupement(array $values): string
    {
        $result = "C'est une operation de groupement :".implode(',', $values);
        return $result;
    }
}







