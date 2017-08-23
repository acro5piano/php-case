# PHP Case

use functional power

# Example

```php
<?php

require __DIR__.'/vendor/autoload.php';

use PhpCase\Support as C;

foreach (range(1, 20) as $x) {
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
16
17
Fizz
19
Buzz
```
