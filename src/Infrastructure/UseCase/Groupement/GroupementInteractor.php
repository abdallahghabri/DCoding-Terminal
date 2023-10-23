<?php

class GroupementInteractor
{
    private $strings;

    public function __construct(array $strings)
    {
        $this->strings = $strings;
    }

    public function groupement(array $strings): string
    {
        return implode(',', $this->getStrings());
    }

    public function getStrings(): array
    {
        return $this->strings;
    }
}




