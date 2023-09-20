<?php

namespace DesignPattern\Right\Tax;

use DesignPattern\Right\Budget;

class Icpp extends TaxWith2Rates
{
    public function shouldMaximumRateApply(Budget $budget): bool
    {
       return $budget->value > 500;
    }

    public function calculateMaxTax(Budget $budget): float
    {
        return $budget->value * 0.03;
    }

    public function calculateMinTax(Budget $budget): float
    {
        return $budget->value * 0.02;
    }
}