<?php

namespace PhpCase;

use PhpCase\When;
use PhpCase\Constant;

class Support
{
    public static function case(...$args){
        $callback = array_pop($args);
        $result = $callback(new When($args), Constant::WILDCARD);
        if ($result instanceof When) {
            return $result->getResult();
        }
        return $result;
    }
}

