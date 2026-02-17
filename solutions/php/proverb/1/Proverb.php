<?php

declare(strict_types=1);

/*
    probably foreach w/side effects
    can't capture outputstream of foreach (?) - can at least see index
*/

class Proverb
{
    public function recite(array $pieces): array
    {
        $proverb = [];
        foreach ($pieces as $i => $piece)
        {
            if (count($pieces) - 1 <= $i)
            {
                $proverb[] = "And all for the want of a $pieces[0].";
            } else 
            {
                $proverb[] = "For want of a $piece the {$pieces[$i+1]} was lost.";
            }
        }

        return $proverb;
    }
}
