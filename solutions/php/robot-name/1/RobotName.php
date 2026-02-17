<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

/*
    Instructions state "The names must be random: they should not follow a predictable sequence." which implies to me that 
*/

class Robot
{
    private string $name;
    public static $history = [];
    const DIGIT_LENGTH = 3;
    
    public function getName(): string
    {
        if (!isset($this->name)){ $this->name = self::generateName(); }
        return $this->name;
    }

    private function generateName(): string
    {
        do {
            $num = str_pad(strval(random_int(0, 999)), self::DIGIT_LENGTH, '0', STR_PAD_LEFT);    
            // $name = $this->rand_char('A', 'Z', 25) . $this->rand_char('A', 'Z', 25) . $num;
            $rand_char = fn() => range('A', 'Z')[random_int(0, 25)];
            $name = $rand_char() . $rand_char() . $num;
            echo "$name\n";
        } while (in_array($name, self::$history));
        self::$history[] = $name;
        return $name;
    }

    /*
    private function rand_char($min, $max, $lim){
        return range($min, $max)[random_int(0, $lim)];
    }*/

    public function reset(): void
    {
        unset($this->name);
    }
}
