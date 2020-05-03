<?php

use PHPUnit\Framework\TestCase;
use App\Calculator\Division;

class DivisionTest extends TestCase
{
    /** @test */
    public function divides_given_operands()
    {
        $division = new Division;
        $division->setOperands([100, 0, 2]);

        $this->assertEquals(50, $division->calculate());
    }

    /** @test */
    public function no_operands_given_throws_exception_when_calculating()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

        $addition = new Division;
        $addition->calculate();
    }

    /** @test */
    public function removes_division_by_zero_operands()
    {
        $division = new Division;
        $division->setOperands([10, 0, 0, 5, 0]);

        $this->assertEquals(2, $division->calculate());
    }
}
