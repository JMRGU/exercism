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

class Bob
{
    public function respondTo(string $str): string
    {
        
        // seems like it lends itself to a selection of cases, and yet not
        
        // I previously spent ages twisting myself into different shapes solving this in different ways
            // instead, keep it simple: use flags for question and yelling (should be consts but it's being prickly) and if-chain
        
        echo $str . " : ";
        $response = 'Whatever.'; // set to default
        
        $is_question = preg_match('/\? *$/', $str);
        $alpha = preg_replace("/[^A-Za-z]/", '', $str); // letters
        $is_yell = preg_match('/^[A-Z]+$/', $alpha);
        
        // response tree
        if ($is_question)
            if ($is_yell)
                $response = "Calm down, I know what I'm doing!";
            else
                $response = "Sure.";
        else if ($is_yell)
            $response = "Whoa, chill out!";
        else if (trim($str) === "")
            $response = "Fine. Be that way!";
        
        return $response;
    
    }
}
