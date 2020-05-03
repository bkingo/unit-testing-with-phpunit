<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;

class Division extends AbstractOperation implements OperationInterface
{
    public function calculate()
    {
        if (count($this->operands) === 0) {
            throw new NoOperandsException;
        }

        // array_filter removes all entries of input equivalent to false
        return array_reduce(array_filter($this->operands), function($a, $b) {
            if ($a !== null && $b !== null) {
                return $a / $b;
            }

            return $b;
        }, null);
    }
}
