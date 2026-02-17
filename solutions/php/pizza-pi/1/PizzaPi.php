<?php

class PizzaPi
{
    const MINIMUM_DOUGH = 200;
    const DOUGH_PER_PERSON = 20;
    const SAUCE_PER_PIZZA = 125;
    
    public function calculateDoughRequirement($pizzas, $serves)
    {
        return $pizzas * (($serves * self::DOUGH_PER_PERSON) + self::MINIMUM_DOUGH);
    }

    public function calculateSauceRequirement($pizzas, $can_volume)
    {
        return $pizzas * self::SAUCE_PER_PIZZA / $can_volume;
    }

    public function calculateCheeseCubeCoverage($cube_side, $thickness, $diameter)
    {
        return floor(($cube_side ** 3) / ($thickness * pi() * $diameter));
    }

    public function calculateLeftOverSlices($pizzas, $friends)
    {
        // each pizza into 8 slices |> number of slices per friend if each take the same amount (i.e. greatest divisor w/remainder => modulo)
        return ($pizzas * 8) % $friends;
    }
}
