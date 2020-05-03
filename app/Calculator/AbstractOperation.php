<?php

namespace App\Calculator;

abstract class AbstractOperation
{
    protected $operands = [];

    public function setOperands(array $operands)
    {
        $this->operands = $operands;
    }
}
