<?php

declare(strict_types=1);

// intuitively, assuming both daughters are same length, just roll through the length comparing items at each
    // (update: cannot assume, expects exception)
// could probably reduce across two arrays, or recursively step through both


function distance(string $strandA, string $strandB): int
{
    if (strlen($strandA) != strlen($strandB)) { throw new InvalidArgumentException("DNA strands must be of equal length."); }
    
    $distance = 0;
    
    for ($i = 0; $i < strlen($strandA); $i++)
    {
        $distance += $strandA[$i] === $strandB[$i] ? 0 : 1;
    }

    return $distance;
}
