## Template Method

Template Method is a behavioral design pattern that defines the skeleton of an algorithm in the superclass but lets subclasses override specific steps of the algorithm without changing its structure.

-----

We need to create a tax calculator. With this, we will have our budget and it will show the specific amount after calculating the taxes.
### The problem

If we do it this way, we can notice a problem: Taxes have the same minimum and maximum rate pattern, so every time we create a tax it would be repeated a lot but only with small changes.

```php
<?php
class Budget 
{
    public float $value;
    public int $quantityItems;
}
```
```php
<?php
class TaxCalculator
{
    public function calc(Budget $budget, Tax $tax) : float
    {
        return $tax->calculateTax($budget);
    }
}
```
```php
<?php
interface Tax
{
    public function calculateTax(Budget $budget) : float;
}
```
```php
<?php
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
```
```php
<?php
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
```

### The solution

Now, using the Template Method pattern, we created an abstract class to help with the rule, making a standardization, which only needs to fill in the data.
```php
<?php
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
```
```php
<?php
class Icpp extends TaxWith2Rates
{
    public function shouldMaximumRateApply(Budget $budget): bool
    {
       return $budget->value > 500;
    }

    public function calculateMaxTax(Budget $budget): float
    {
        return $budget->value * 0.03;
    }

    public function calculateMinTax(Budget $budget): float
    {
        return $budget->value * 0.02;
    }
}
```
```php
<?php
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
```

-----

### Installation for test

![PHP Version Support](https://img.shields.io/badge/php-7.4%2B-brightgreen.svg?style=flat-square) ![Composer Version Support](https://img.shields.io/badge/composer-2.2.9%2B-brightgreen.svg?style=flat-square)

```bash
composer install
```

```bash
php wrong/test.php
php right/test.php
```