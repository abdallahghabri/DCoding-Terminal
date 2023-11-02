<?php

namespace App\Domain\Flag\FlagInteractor;
class FlagInteractor
{
    private $flagActive;

    public function isFlagActive(array $flag): bool
    {
        return $this->flagActive;
    }
}

