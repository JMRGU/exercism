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

/*
    Probably the intended & simplest way to encode is to split the input string into arrays of like characters, then construct the output with the lengths of each array

    But it's more interesting to do recursively

    So I'll encode recursively then decode with a pattern match
*/

declare(strict_types=1);

function encode(string $input): string
{
    return recursiveCount(substr($input, 1), $input[0], 1, '');
}

function recursiveCount(string $in, string $char, int $count, string $out){
    
    if ($in === ''){
        echo "returning\n";
        return $out .= $count === 1 ? "$char" : "$count$char"; // "$count$char";
    }
    if ($in[0] === $char){
        echo "another char\n";
        return recursiveCount(substr($in, 1), $char, $count += 1, $out);
    }
    
    if ($in[0] !== $char){
        echo "different char\n";
        return recursiveCount(substr($in, 1), $in[0], 1, $out .= $count === 1 ? "$char" : "$count$char"); //  $out .= "$count$char");
    }
}

function decode(string $input): string
{
    // match for groups of <digit.char> || <char>, split into an array thereof; map through each repeating digits

    // also wants whitespace and lowercase chars accepted

    // ended up a little ugly with the multiple regexes, but valid

    $regex = '/[0-9]{0,2}[A-Za-z\s]{1}/';
    preg_match_all($regex, $input, $parsed); // returns values in nested array, bit annoying

    $pad = function($v) {
        preg_match('/[0-9]*/', $v, $digits);
        preg_match('/[A-Za-z\s]{1}/', $v, $chars);
        return strlen($v) > 1 ? str_repeat($chars[0], intval($digits[0])) : $v;
            // can use "$v[1] ?" as the condition, but gives a warning, bit cheeky
            // also, implicit coercion of "int" to int works on my machine
    };
    
    $res = array_map($pad, $parsed[0]);
    return implode($res);
}
