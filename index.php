<?php
//Lessons 5: Objects
abstract class Main
{
    public float $first = 10;
    public float $second = 5;
    public int $exponent = 3;

    public function getFirst(): float
    {
        return $this->first;
    }
    public function setFirst(float $first): void
    {
        $this->first = $first;
    }

    public function getSecond(): float
    {
        return $this->second;
    }
    public function setSecond(float $second): void
    {
        $this->second = $second;
    }

    abstract public function calcPower(): float;
}

class firstHeritor extends Main
{
    public float $firstChild = 11;

    public function getFirstChild(): float
    {
        return $this->firstChild;
    }
    public function setFirstChild(float $firstChild): void
    {
        $this->firstChild = $firstChild;
    }
    public function calcDivide(): float
    {
        return $this->first / $this->firstChild;
    }
    public function calcExp(): float
    {
        return $this->first ** $this->second;
    }

    public function calcPower(): float
    {
        return pow($this->getFirst(), $this->exponent);
    }
}

class secondHeritor extends Main
{
    public float $secondChild = 22;

    public function getSecondChild(): float
    {
        return $this->secondChild;
    }
    public function setSecondChild(float $secondChild): void
    {
        $this->secondChild = $secondChild;
    }
    public function calcMultiply(): float
    {
        return $this->second * $this->secondChild;
    }
    public function calcPower(): float
    {
        return pow($this->getFirst(), $this->exponent);
    }
}

class thirdHeritor extends Main
{
    private float $thirdChild = 33;

    public function getThirdChild(): float
    {
        return $this->thirdChild;
    }
    public function setThirdChild(float $thirdChild): void
    {
        $this->thirdChild = $thirdChild;
    }
    public function calcSum(): float
    {
        return $this->first + $this->thirdChild;
    }
    public function calcPower(): float
    {
        return pow($this->thirdChild, $this->exponent);
    }
}

class firstGrandHeritor extends Main
{
    public float $firstGrandChild = 15;

    public function getFirstGrandChild(): float
    {
        return $this->firstGrandChild;
    }
    public function setFirstGrandChild(float $firstGrandChild): void
    {
        $this->firstGrandChild = $firstGrandChild;
    }

    public function calcSubstract(): float
    {
        return $this->firstGrandChild - $this->first;
    }
    public function calcPower(): float
    {
        return pow($this->first, $this->exponent);
    }
}

final class secondGrandHeritor extends Main
{
    public float $secondGrandHeritor = 31;

    public function getSecondGrandHeritor(): float
    {
        return $this->secondGrandHeritor;
    }
    public function setSecondGrandHeritor(float $secondGrandHeritor): void
    {
        $this->secondGrandHeritor = $secondGrandHeritor;
    }
    public function calcSqrt(): float
    {
        return sqrt($this->second * $this->secondGrandHeritor);
    }
    public function calcPower(): float
    {
        return $this->secondGrandHeritor ** $this->exponent;
    }
}
echo "10 ** 5 = ";
$obj = new firstHeritor();
echo ($obj->calcExp());
PHP_EOL;

echo "5 * 22 = ";
$obj = new secondHeritor();
echo ($obj->calcMultiply());
PHP_EOL;

echo "5 + 15 = ";
$obj = new ThirdHeritor();
echo ($obj->calcSum());
PHP_EOL;


echo "33 ** 3 = ";
echo ($obj->calcPower());
PHP_EOL;

echo "15 -10 = ";
$obj = new FirstGrandHeritor();
echo ($obj->calcSubstract());
PHP_EOL;


echo "10 ** 3 = ";
echo ($obj->calcPower());
PHP_EOL;


echo "sqrt(5 * 31) = ";
$obj = new SecondGrandHeritor();
echo ($obj->calcSqrt());
PHP_EOL;

echo "31 ** 3 = ";
$obj = new SecondGrandHeritor();
echo ($obj->calcPower());
