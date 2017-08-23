<?php

namespace PhpCase;

class When
{
    protected $result, $cond, $matched;

    public function __construct(array $cond)
    {
        $this->result = '';
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
            if ($pattern[$i] !== '__' && $pattern[$i] !== $this->cond[$i]) {
                $matched = false;
            }
        }
        $this->matched = $matched;

        return $this;
    }

    public function then($value)
    {
        if ($this->matched && $this->result === '') {
            $this->result = $value;
        }

        return $this;
    }

    public function else($value)
    {
        if ($this->result === '') {
            return $value;
        }

        return $this->result;
    }

    public function __toString()
    {
        return $this->result;
    }
}
