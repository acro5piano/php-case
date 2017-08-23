<?php

namespace PhpCase;

use PhpCase\When;

class Support
{
    public static function case(...$args){
        $callback = array_pop($args);
        return $callback(new When($args), '__');
    }
}

