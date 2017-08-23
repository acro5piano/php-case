<?php

namespace PhpCase;

use PhpCase\Constant;

class When
{
    protected $result, $cond, $matched;

    public function __construct(array $cond)
    {
        $this->result = null;
        $this->matched = false;
        $this->cond = $cond;
    }

    public function __invoke(...$pattern)
    {
        return $this->when(...$pattern);
    }

    public function when(...$pattern)
    {
        $matched = true;
        for ($i = 0; $i < count($pattern); ++$i) {
            if ($pattern[$i] !== Constant::WILDCARD && $pattern[$i] !== $this->cond[$i]) {
                $matched = false;
            }
        }
        $this->matched = $matched;

        return $this;
    }

    public function then($value)
    {
        if ($this->matched && $this->result === null) {
            $this->result = $value;
        }

        return $this;
    }

    public function else($value)
    {
        if ($this->result === null) {
            return $value;
        }

        return $this->result;
    }

    public function __toString()
    {
        return $this->result;
    }
}
