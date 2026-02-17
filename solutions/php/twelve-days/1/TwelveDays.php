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


/* simple to do w/nested for loops, something like:
    for ($i = $origin; $i < $dest; $i++){
        $carol .= "On the {$indices[$i]} day of Christmas: ";
        
        for ($j = $i; $j >= 0; $j--){
            $carol .= "{$prezzies[$indices[$j]]}";
            $carol .= $j === 1 ? " and " : ', ';
            $carol .= $j <= 0 ? ".\n" : "";
        }
    }

    but that's boring
*/

/*
    screams recursion
    figure a map of 'first' => 'a Patridge in a Pear Tree' etc.
        and an array of keys, for indices
        (I ended up searching presents array by index, so needn't be an assoc array, ran out of time when I finished it so left for posterity)

    basically a loop within a loop:
        loop from start->finish:
            "from first day" -> "from second day"
            on each line: loop from finish->start:
                "gave to me: three xyz, two abc, and a def"

    This can probably be done using a single recursive function, I used an outer & inner

*/

class TwelveDays
{
    var $LINES = ['first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eighth', 'ninth', 'tenth', 'eleventh', 'twelfth'];
    
    var $PREZZIES = [
    'first' => 'a Partridge in a Pear Tree',
    'second' => 'two Turtle Doves',
    'third' => 'three French Hens',
    'fourth' => 'four Calling Birds',
    'fifth' => 'five Gold Rings',
    'sixth' => 'six Geese-a-Laying',
    'seventh' => 'seven Swans-a-Swimming',
    'eighth' => 'eight Maids-a-Milking',
    'ninth' => 'nine Ladies Dancing',
    'tenth' => 'ten Lords-a-Leaping',
    'eleventh' => 'eleven Pipers Piping',
    'twelfth' => 'twelve Drummers Drumming'
    ];
    
    public function recite(int $start, int $end): string
    {
        return $this->outer($start - 1, $end - 1, ''); // shockingly, the test cases index their lines from 1, not 0
    }

    private function outer($line, $end, $carol)
    {
        if ($line > $end){ // end of lines: return carol
            return $carol;
        } else { // not end of lines: go to next line
            return $this->inner($line, $end, $line, $carol . "On the {$this->LINES[$line]} day of Christmas my true love gave to me: ");
        }
    }
    
    private function inner($line, $end, $prez, $carol)
    {
        if ($prez < 0){ // end of row?  return next row
            return $this->outer($line + 1, $end, $carol . ($line < $end ? "\n" : '')); // wants newline but only on lines preceding final, okay
        } else { // not end of row: return next item
            return $this->inner($line, $end, $prez - 1, $carol . "{$this->PREZZIES[array_keys($this->PREZZIES)[$prez]]}" . ($prez > 0 ? ', ' : ".") . ($prez === 1 ? 'and ' : ''));
        }
    }
}




