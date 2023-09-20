<?php

use DesignPattern\Wrong\Tax\Icms;
use DesignPattern\Wrong\Tax\Icpp;
use DesignPattern\Wrong\Tax\Ikcv;
use DesignPattern\Wrong\Tax\Iss;
use DesignPattern\Wrong\TaxCalculator;
use DesignPattern\Wrong\Budget;

require "vendor/autoload.php";

$calculator = new TaxCalculator();
$budget =  new Budget();
$budget->value = 100;

echo "Value : ".$budget->value . PHP_EOL;
echo "with tax ICPP : ".$calculator->calc($budget, new Icpp()) . PHP_EOL;
echo "with tax IKCV : ".$calculator->calc($budget, new Ikcv()) . PHP_EOL;