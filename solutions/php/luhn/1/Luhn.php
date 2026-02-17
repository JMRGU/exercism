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

function isValid(string $number): bool
{
    //validate length > 1 && digits & spaces only   
    if (!preg_match("/^[\s\d]{2,}$/", $number)){
        echo "\ninvalid";
        return false;
    }
    
    // remove whitespace
    $num = preg_replace("/(\s)/", '', $number);

    // doublecheck digits alone are sufficient length (special case for isValid(" 0")), should really incorporate into regex above (?)
    if (strlen($num) <= 1) { return false;}
    
    // transformation:
        // determine starting digit based on length (0 if even, 1 if odd)
    $step = strlen($num) % 2;
    
        // loop through each item from start point
            //lots of ways to do this:
                // for loop is obvious though I tend to avoid these (hard to justify in this case though...)
                // could foreach / array_map and check index % 2 matches $step
                // or create an iterator
                // also, consider array_map vs array_walk (particularly, availability of keys)
            // will map to new array
    
    // quick & dirty arrow function: if key is on offest, double; if doubled > 9: subtract 9; otherwise return doubled; else original
    $fnTransform = fn(int $k, string $v): int|string => $k % 2 === $step ? $v * 2 > 9 ? $v * 2 - 9 : $v * 2 : $v; // int|string, or coerce default case $v to int
    $transformed = array_map($fnTransform, array_keys(str_split($num)), str_split($num));
    
    // finally, sum all digits and confirm divisible by 10
    return array_sum($transformed) % 10 === 0 ? true : false;
}
