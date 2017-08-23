# PHP Case

Use functional programming power in PHP

# Example

```php
<?php

use PhpCase\Support as C;

foreach (range(1, 15) as $x) {
    echo C::case($x % 3, $x % 5, $x % 15, function($when, $_) use ($x) {
        return $when($_, $_, 0)->then('FizzBuzz')
            ->when($_, 0, $_)->then('Buzz')
            ->when(0, $_, $_)->then('Fizz')
            ->else($x);
    })."\n";
}
```

outputs:

```
1
2
Fizz
4
Buzz
Fizz
7
8
Fizz
Buzz
11
Fizz
13
14
FizzBuzz
```

# Document

## Getting Started

This library provide functional `case` expression to PHP.
All functional language has it. For example:

```elixir
case {1, 2, 3} do
  {4, 5, 6} ->
    "This clause won't match"
  {1, x, 3} ->
    "This clause will match and bind x to 2 in this clause"
  _ ->
    "This clause would match any value"
end
```


# TODO

- [x] add constant for wildcard
- [x] return null when case else not provided
- [ ] Deploy to composer
- [ ] add caseLoose() pattern
- [ ] raise IllegalPatternException when the arguments numbers don't match
