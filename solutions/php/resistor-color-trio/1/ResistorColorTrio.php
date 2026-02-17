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

// map colours to code digits
// final digit is power
// pop final digit, 

// instructions want metric prefixes e.g. "kiloohms" instead of "x000 ohms", shame on them
    // so need another assoc array of all possible prefixes?
    // let's suppose that prefixes are grouped around 0..2 zeroes


class ResistorColorTrio
{
    public function label(array $labels): string
    {
            // assoc array of colours
        $code_map = array('black','brown','red','orange','yellow','green','blue','violet','grey','white');

            // map each label to corresponding digit
        $colours = array_map(fn(string $colour): int => array_search($colour, $code_map), $labels);
            // thus have a string representing [..ohms, number of trailing zeroes]; 

            // the instructions don't state this directly ("The program will take 3 colors as input"), but in case of >3 digits, I *think* you replace all but the first two and the last with zeroes; see Test 10
        $colours_normal = array_map(fn($k, $v): int|string => $k > 1 && $k < count($colours) - 1 ? '0' : $v, array_keys($colours), $colours);
            // this really ought to have been done as part of ln44's map; but $code_map is inaccessible without passing into the map, but don't want to deconstruct and iterate through it; not obvious to me how to sort so moving on for now
        
            // pop final digit off and combine to get total ohms
        $zeroes = str_repeat("0", array_pop($colours_normal)); // cheeky side effect
        $ohms = implode($colours_normal) . $zeroes; // thus get total ohms
        
            // now determine units by recursively reducing by 1000, and matching number of steps against unit index
        $unit_map = array('ohm', 'kiloohm', 'megaohm', 'gigaohm');
        
        $composite = $this->fn_reduce((int)$ohms, 0); // i.e. "composite result" consisting of measure:unit steps
        
        // print_r($composite);
        
            // form output
        $measure = key($composite); // note: key() returns key of first elem, apparently
        $unit = $unit_map[$composite[key($composite)]];

        echo $measure;
        echo $unit;
        
            // handle plurals
        $unit = $measure === 1 ? $unit : $unit . 's';
            
        return $measure . ' ' . $unit; 
    }

    public function fn_reduce(int $val, int $steps){
            if ($val < 1000){
                return array($val => floor($steps)); // i.e. measure => unit steps normalised by 3
            } else {
                return $this->fn_reduce($val / 1000, $steps + 1);
            }
    } // works

    
}
