<?php

namespace DesignPattern\Right\Tax;

use DesignPattern\Right\Budget;

interface Tax
{
    public function calculateTax(Budget $budget) : float;
}