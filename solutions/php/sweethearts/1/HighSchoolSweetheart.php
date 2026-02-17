<?php

class HighSchoolSweetheart
{
    public function firstLetter(string $name): string
    {
        return trim($name)[0];
    }

    public function initial(string $name): string
    {
        return strtoupper(self::firstLetter($name)) . '.';
    }

    public function initials(string $name): string
    {
        // trim whitespace |> split (explode) on whitespace |> map against initial() |> concatenate w/' '
        return implode(' ', array_values(array_map('self::initial', explode(' ', $name))));
    }

    public function pair(string $sweetheart_a, string $sweetheart_b): string
    {

        $initials = [self::initials($sweetheart_a), self::initials($sweetheart_b)];
        
        return <<<HEART
     ******       ******
   **      **   **      **
 **         ** **         **
**            *            **
**                         **
**     $initials[0]  +  $initials[1]     **
 **                       **
   **                   **
     **               **
       **           **
         **       **
           **   **
             ***
              *
HEART;
    }
}
