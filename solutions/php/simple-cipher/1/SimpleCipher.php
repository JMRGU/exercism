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

class SimpleCipher
{

    public $key;
    
    public function __construct(string $key = "aaaaaaaaaaaaaaaaaa")
    {
        # throw new BadFunctionCallException("Please implement the SimpleCipher class!");
        # apparently supposed to throw an invalid arg exception if not lowercase
        if (!preg_match("~[a-z]+~", $key)){
            throw new InvalidArgumentException("Lowercase key only, no numbers, apparently");
        }
        $this->key = $key;
    }

    public function encode(string $plainText): string
    {
        # smart way to do this is to find the remainder when char result is divided against limit. wrapping around 0-25 chars of alphabet
        # i.e. bring ASCII val down to 0-25, add shift, find remainder under 26, then bring up to ASCII again
        
        $cipherText = "";
        
        foreach (str_split($plainText) as $i => $char){
            # determine if lower or uppercase char
            
            $lower = ord($char) >= 65 && ord($char) <= 90 ? 65 : 97;
            
            $cipherText .= chr((((ord($char) - $lower) + (ord($this->key[$i]) - $lower)) % 26) + $lower);
        }

        return $cipherText;
        
    }

    public function decode(string $cipherText): string
    {
        # just as above, except subtract

        $plainText = "";
        foreach (str_split($cipherText) as $i => $char){
            # determine if lower or uppercase char
            $lower = ord($char) >= 65 && ord($char) <= 90 ? 65 : 97;
            
            # $plainText .= chr((ord($char) - (ord($this->key[$i]) - $lower)) % $upper); # this is wrong, but actually works, because the test data is garbage

            $plainText .= chr((((ord($char) - $lower) - (ord($this->key[$i]) - $lower)) % 26) + $lower);
        }

        return $plainText;
    }
}
