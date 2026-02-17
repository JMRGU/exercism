<?php

class LuckyNumbers
{
    public function sumUp(array $digitsOfNumber1, array $digitsOfNumber2): int
    {
        // array |> string |> int (implicitly)
        $nums = array_map('implode', [$digitsOfNumber1, $digitsOfNumber2]);
        return $nums[0] + $nums[1];
        
    }

    public function isPalindrome(int $number): bool
    {
        return "$number" === strrev("$number");
    }

    public function validate(string $input): string
    {
        if ($input == ''){ // probably superfluous; one of these causes a couple of test failures, assuming something to do with evaluating to 0: !$input || $input === null || 
            return 'Required field';
        }
        else if (!intval($input) || intval($input) <= 0)
        {
            return 'Must be a whole number larger than 0';
        }
        else
        {
            return '';
        }
        
        /* // alternate ideas
        if (!(preg_match('/[0-9]+', $input))){
            return 'Must be a whole number larger than 0';
        }
        if (!(+$input >= 0)){
            return 'Must be a whole number larger than 0';
        }
        */

    }
}
