<?php

namespace DesignPattern\Wrong\Tax;

use DesignPattern\Wrong\Budget;

interface Tax
{
    public function calculateTax(Budget $budget) : float;
}