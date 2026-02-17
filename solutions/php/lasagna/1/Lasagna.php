<?php

class Lasagna
{
    // going with $snake_case for vars, camelCase() for functions
    const COOK_TIME = 40;
    
    public function expectedCookTime()
    {
        return self::COOK_TIME;
    }

    public function remainingCookTime($elapsed_minutes)
    {
        return self::COOK_TIME - $elapsed_minutes;
    }

    public function totalPreparationTime($layers_to_prep)
    {
        return 2 * $layers_to_prep;
    }

    public function totalElapsedTime($layers_to_prep, $elapsed_minutes)
    {
        return self::totalPreparationTime($layers_to_prep) + $elapsed_minutes;
    }

    public function alarm()
    {
        return "Ding!";
    }
}
