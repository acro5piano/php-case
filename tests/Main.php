<?php

require __DIR__.'/../vendor/autoload.php';

use PhpCase\Support as C;

foreach (range(1, 20) as $x) {
    echo C::case($x % 3, $x % 5, $x % 15, function($when, $_) use ($x) {
        return $when($_, $_, 0)->then('FizzBuzz')
            ->when($_, 0, $_)->then('Buzz')
            ->when(0, $_, $_)->then('Fizz')
            ->else($x);
    })."\n";
}
