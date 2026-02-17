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
    Largest Series Product

    reminds of how you read DNA ATCG sequences in six reading frames

    what's the smart way to pull all valid frames of length n from a string...

    could theoretically do it with a range of [0..span] then find the total number of span-length frames then loop through
*/

class Series
{
    var $input;
    
    public function __construct(string $input)
    {
        // rejection clauses
        if (preg_match('/[^0-9]+/', $input)) { throw new InvalidArgumentException('Error: invalid input string provided'); }
        $this->input = $input;
    }

    public function largestProduct(int $span): int
    {
        // rejection clauses
        if ($span > strlen($this->input) || ($this->input === '' && $span !== 0) || $span < 0 ){
            throw new InvalidArgumentException('Error: span greater than length of input, or nonzero span given with empty input, or span less than zero');
        }
        // wants 1 returned for an empty span, all else being valid; shorthand way to account for this special case
        if ($span === 0){ return 1; }
        
        /* // generic way to grab frames, using for loop

            for ($i = 0; $i < strlen($input); $i++){
                $frame = substr($input, $i, $span);
                if (strlen($frame) === $span) { array_push($frames, $frame); }
            }
        */ // then filter for length === $span, product & return largest

        // parse input string into frames of length===$span
        $frames = [];
        foreach (range(0, $span - 1) as $i){
            $frames = array_filter(array_merge($frames, explode(',', wordwrap(substr($this->input, $i), $span, ',', true))), fn($f) => strlen($f) === $span);
        } // i.e. foreach 0..$span-1, wrap input from this index in commas, then explode on commas to create array, append values to end of $frames, filtered by length of each array item === $span
        
        // find product of each series
        $products = array_map(fn($v) => array_reduce(str_split($v, 1), fn($sum, $v1) => $sum *= intval($v1), 1), $frames);

        // return largest
        return array_reduce($products, fn($largest, $v) => $v > $largest ? $v : $largest, 0);
    }

}
