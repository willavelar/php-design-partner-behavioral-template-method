<?php

namespace DesignPattern\Right\Tax;

use DesignPattern\Right\Budget;

class Ikcv extends TaxWith2Rates
{
    public function shouldMaximumRateApply(Budget $budget): bool
    {
        return $budget->value > 300 && $budget->quantityItems > 3;
    }

    public function calculateMaxTax(Budget $budget): float
    {
       return $budget->value * 0.04;
    }

    public function calculateMinTax(Budget $budget): float
    {
        return $budget->value * 0.025;
    }
}