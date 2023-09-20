<?php

use DesignPattern\Right\Tax\Icpp;
use DesignPattern\Right\Tax\Ikcv;
use DesignPattern\Right\TaxCalculator;
use DesignPattern\Right\Budget;

require "vendor/autoload.php";

$calculator = new TaxCalculator();
$budget =  new Budget();
$budget->value = 100;

echo "Value : ".$budget->value . PHP_EOL;
echo "with tax ICPP : ".$calculator->calc($budget, new Icpp()) . PHP_EOL;
echo "with tax IKCV : ".$calculator->calc($budget, new Ikcv()) . PHP_EOL;