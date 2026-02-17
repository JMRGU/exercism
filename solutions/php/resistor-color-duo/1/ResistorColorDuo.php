<?php

declare(strict_types=1);

// first two digits only
// concat keys of first two

class ResistorColorDuo
{   
    public function getColorsValue(array $colors): int
    {   
        // pretty sure arrays are explicitly key:value hashtables in PHPland, where key is index
        $ALL_COLOURS = ["black", "brown","red","orange","yellow","green","blue","violet","grey","white"];
        // so grab keys, concatenate them, and return as int
        return +(array_search($colors[0], $ALL_COLOURS) . array_search($colors[1], $ALL_COLOURS));
    }
}
