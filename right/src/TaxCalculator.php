<?php

namespace DesignPattern\Right;

use DesignPattern\Right\Tax\Tax;

class TaxCalculator
{
    public function calc(Budget $budget, Tax $tax) : float
    {
        return $tax->calculateTax($budget);
    }
}