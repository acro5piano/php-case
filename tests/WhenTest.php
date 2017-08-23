<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use PhpCase\Support as C;

class WhenTest extends TestCase
{
    public function testFizzBuzz()
    {
        $this->assertEquals('Fizz', $this->getFizzBuzzValue(3));
        $this->assertEquals(1, $this->getFizzBuzzValue(1));
        $this->assertEquals('Buzz', $this->getFizzBuzzValue(5));
        $this->assertEquals('FizzBuzz', $this->getFizzBuzzValue(15));
    }

    public function testNoElse()
    {
        $none = C::case(1, 2, function ($when) {
            return $when(1, 1)->then('All one');
        });
        $this->assertEquals(null, $none);
    }

    private function getFizzBuzzValue(int $num)
    {
        return C::case($num % 3, $num % 5, $num % 15, function($when, $_) use ($num) {
            return $when($_, $_, 0)->then('FizzBuzz')
                ->when($_, 0, $_)->then('Buzz')
                ->when(0, $_, $_)->then('Fizz')
                ->else($num);
        });
    }
}
