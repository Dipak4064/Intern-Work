<!-- Task: Write a program using OOP to create a calculator class with arithmetic operation -->
<?php
class oops
{
    public function add($x, $y)
    {
        return $x + $y;
    }
    public function subtract($x, $y)
    {
        return $x - $y;
    }
    public function multiply($x, $y)
    {
        return $x * $y;
    }
    public function divide($x, $y)
    {
        return $x / $y;
    }
    public function mod($x, $y)
    {
        return $x % $y;
    }
    public function pow($x, $y)
    {
        return $x ** $y;
    }
}

$operation = new oops;
echo "Add = " . $operation->add(5, 5) . "\n";
echo "subtract = " . $operation->subtract(5, 5) . "\n";
echo "Multiply = " . $operation->multiply(5, 5) . "\n";
echo "Divide = " . $operation->divide(5, 5) . "\n";
echo "Mod = " . $operation->mod(9, 5) . "\n";
echo "Power = " . $operation->pow(5, 3) . "\n";
?>