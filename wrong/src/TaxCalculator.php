<?php

namespace DesignPattern\Wrong;

use DesignPattern\Wrong\Tax\Tax;

class TaxCalculator
{
    public function calc(Budget $budget, Tax $tax) : float
    {
        return $tax->calculateTax($budget);
    }
}