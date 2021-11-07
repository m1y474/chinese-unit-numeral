# chinese-unit-numeral

## Install

```
composer require m1y474/chinese-unit-numeral
```

## Usage
```php
use ChineseUnitNumeral\ChineseUnitNumeral;

assert('私の戦闘力は53万です' === '私の戦闘力は'.ChineseUnitNumeral::convert(530000).'です'); // true
```
