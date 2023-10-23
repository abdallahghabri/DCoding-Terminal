<?php

class KataFactory
{
    public function getInteractor($operationTypes, $values)
    {
        $interactors = [];

        foreach ($operationTypes as $operationType) {
            switch ($operationType) {
                case '-g':
                    $interactors[] = new GroupementInteractor($values);
                    break;
                case '-d':
                    $interactors[] = new SommeInteractor($values);
                    break;
                case '-b':
                    $interactors[] = new FlagInteractor(true); 
                    break;
                default:
                    throw new InvalidArgumentException('Invalid operation type: ' . $operationType);
            }
        }

        return $interactors;
    }
}




