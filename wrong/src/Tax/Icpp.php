<?php

namespace DesignPattern\Wrong\Tax;

use DesignPattern\Wrong\Budget;

class Icpp implements Tax
{

    public function calculateTax(Budget $budget): float
    {
        if ($budget->value > 500) {
            return $budget->value * 0.03;
        }

        return $budget->value * 0.02;
    }
}