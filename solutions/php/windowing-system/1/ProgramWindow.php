<?php

class ProgramWindow
{
    public $x; // would prefer private, but the tests fail and can't confirm an expected getter name
    public $y;
    public $width;
    public $height;

    function __construct()
    {
        $this->x = 0;
        $this->y = 0;
        $this->width = 800;
        $this->height = 600;
    }

    function resize($size)
    {
        $this->width = $size->width;
        $this->height = $size->height;
    }

    function move($pos)
    {
        $this->x = $pos->x;
        $this->y = $pos->y;
    }
}

class Size
{
    public $width;
    public $height;
    
    // instructions seem to imply (height, width); not (width, height)
    function __construct($height, $width)
    {
        $this->height = $height;
        $this->width = $width;
    }
}

class Position
{
    public $x;
    public $y;

    function __construct($y, $x) // again, (y, x)
    {
        $this->y = $y;
        $this->x = $x;
    }
}