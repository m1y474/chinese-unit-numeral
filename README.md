# unit-numeral-ch

## Install

```
composer require m1y474/unit-numeral-ch
```

## Usage
```php
use UnitNumeralCh\UnitNumeralCh;

assert('私の戦闘力は53万です' === '私の戦闘力は'.UnitNumeralCh::convert(530000).'です'); // true
```
