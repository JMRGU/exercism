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
    difference between square of sum(N), and sum of squares(<=N)

    feel like just recurse, but it talking about the most efficient algorithm makes me wonder what the smart way is

    if N=10 => 3025 - 385 = 2640
    I wonder if there's another way to arrive at this number

    Also consider the differences between each square, maybe something there

    Code recursive solution and see
        the common issue with this is that they expect to call the given functions
        so to do recursively, I have to call my own functions from the given ones
        which is fine, but feels sloppy
    
*/

function squareOfSum(int $max): int
{
    $sum = 0;
    foreach (range(1, $max) as $i){
        $sum += $i;
    }
    return $sum ** 2;
}

function sumOfSquares(int $max): int
{
    $sum = 0;
    foreach (range(1, $max) as $i){
        $sum += $i ** 2; // or $i * $i, tossup I suppose
    }
    return $sum;
}

function difference(int $max): int
{
    return squareOfSum($max) - sumOfSquares($max);
}
