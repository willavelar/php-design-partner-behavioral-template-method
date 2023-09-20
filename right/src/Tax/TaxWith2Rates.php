<?php

namespace DesignPattern\Right\Tax;

use DesignPattern\Right\Budget;

abstract class TaxWith2Rates implements Tax
{
   public function calculateTax(Budget $budget): float
   {
       if ($this->shouldMaximumRateApply($budget)) {
           return $this->calculateMaxTax($budget);
       }

       return $this->calculateMinTax($budget);
   }

   abstract public function shouldMaximumRateApply(Budget $budget) : bool;
    abstract public function calculateMaxTax(Budget $budget) : float;
    abstract public function calculateMinTax(Budget $budget) : float;
}