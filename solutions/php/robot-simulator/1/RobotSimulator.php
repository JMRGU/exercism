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

class RobotSimulator
{
    var $position;
    var $direction;
    const ORIENTATIONS = ['north', 'east', 'south', 'west'];
    const UPPER_ORIENTATION = 3; // i.e. upper bound of orientations; see turn()
        // quirk of PHP apparently - generally can't declare constants with expressions, even where the expression is determinative of another constant already defined (e.g. "count(ORIENTATIONS) - 1;"
    
    /** @param int[] $position */
    public function __construct(array $position, string $direction)
    {
        $this->position = $position;
        $this->direction = in_array($direction, self::ORIENTATIONS) ? $direction : throw new InvalidArgumentException();
            // good practice to confirm the given direction is valid (even though the test cases all are)
    }

    /** @param string $instructions */
    public function instructions(string $instructions): void
    {
        // validate matches $[RAL]*^ (doesn't look like they test this, but good practice)
        if (!preg_match('/^[ALR]+$/', $instructions)) { return; }
        
        // work through each instruction in sequence
        foreach(str_split($instructions) as $i){
            // turn: if left, -1 to key of $this->position; if right, +1
            switch ($i){
                case 'L':
                    $this->direction = self::ORIENTATIONS[$this->turn(-1)]; // $this->orientations[];
                    break;
                case 'R':
                    $this->direction = self::ORIENTATIONS[$this->turn(1)]; // $this->orientations
                    break;
                case 'A':
                    // feel like there's something clever here
                
                    switch($this->direction){
                        case 'north':
                            $this->position[1] += 1;
                            break;
                        case 'east':
                            $this->position[0] += 1;
                            break;
                        case 'south':
                            $this->position[1] -= 1;
                            break;
                        case 'west':
                            $this->position[0] -= 1;
                            break;
                    }
            }
            // prefer not to have defaults; we already select for valid instructions only; don't like the idea of unpredictable default behaviour occurring (hypothetically)
        }
        
    }

    /** @return int */
    private function turn($dir): int
    {
        return (array_search($this->direction, self::ORIENTATIONS) + $dir + (self::UPPER_ORIENTATION + 1)) % (self::UPPER_ORIENTATION + 1);
    }

    /** @return int[] */
    public function getPosition(): array
    {
        return $this->position; // return value of?
    }

    /** @return string */
    public function getDirection(): string
    {
        return $this->direction;
    }
}
