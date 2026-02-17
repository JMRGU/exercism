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

class HighScores
{
    public $scores;
    public $latest;
    public $personalBest;
    public $personalTopThree;
    
    public function __construct(array $scores)
    {
        # spun everything out into private functions - no particular advantage here except that we can sort a copy of $scores in getPersonalTopThree(), rather than the constructor param $scores which we might otherwise want unsorted 
        $this->scores = $scores;
        $this->latest = $this->getLatest($scores);
        $this->personalBest = $this->getMax($scores);
        $this->personalTopThree = $this->getPersonalTopThree($scores);
    }

    private function getLatest($scores)
    {
        return $scores[count($scores) - 1];
    }

    private function getMax($scores)
    {
        return max($scores);
    }

    private function getPersonalTopThree($scores)
    {
        rsort($scores);
        return array_slice($scores, 0, 3);
    }
}
