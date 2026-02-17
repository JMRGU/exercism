<?php

declare(strict_types=1);

/*
    theoretically would have to code in months, and days of months, and algo for leap years
    but I'm guessing DateTimeImmutables make adding to dates simpler
*/

function from(DateTimeImmutable $date): DateTimeImmutable
{
    $gigasecond = new DateInterval("PT1000000000S");
    return $date->add($gigasecond);
    // PHP date handling is absolutely disgusting
}
