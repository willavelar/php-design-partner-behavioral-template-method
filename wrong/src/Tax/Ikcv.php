<?php

namespace DesignPattern\Wrong\Tax;

use DesignPattern\Wrong\Budget;

class Ikcv implements Tax
{

    public function calculateTax(Budget $budget): float
    {
        if ($budget->value > 300 && $budget->quantityItems > 3) {
            return $budget->value * 0.04;
        }

        return $budget->value * 0.025;
    }
}