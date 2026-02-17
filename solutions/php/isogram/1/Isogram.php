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

// isograms i.e. no repeated chars except whitespace & hyphens
// lots of ways to do this e.g.
    // substr_count() and compare sum
    // remove duplicates (array_unique) and compare lengths
    // (array_intersect against alphabet, array_reduce, array_filter, array_merge, something really silly with a sort, something else silly with difference against alphabet, ...)


function isIsogram(string $word): bool
{
    // cast to lowercase, remove all but chars
    $lower = preg_replace("/[^a-z]*/", '', strtolower($word));

    // (1) substr_count()
    // $fnCount = fn(string $v): int => substr_count($lower, $v);
    // $counts = array_map($fnCount, str_split($lower));
    
    // quick & dirty - compare sum of counts with length of input
    // return array_sum($counts) === strlen($lower) ? true : false;

    // (2) remove duplicates & compare lengths
    $unique = array_unique(str_split($lower));
    return count($unique) === strlen($lower) ? true : false;

    // etc.
}
