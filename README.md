Wrapper types
=============

[![Build Status on TravisCI](https://secure.travis-ci.org/xp-forge/wrappers.svg)](http://travis-ci.org/xp-forge/wrappers)
[![XP Framework Module](https://raw.githubusercontent.com/xp-framework/web/master/static/xp-framework-badge.png)](https://github.com/xp-framework/core)
[![BSD Licence](https://raw.githubusercontent.com/xp-framework/web/master/static/licence-bsd.png)](https://github.com/xp-framework/core/blob/master/LICENCE.md)
[![Required PHP 5.4+](https://raw.githubusercontent.com/xp-framework/web/master/static/php-5_4plus.png)](http://php.net/)
[![Supports PHP 7.0+](https://raw.githubusercontent.com/xp-framework/web/master/static/php-7_0plus.png)](http://php.net/)
[![Required HHVM 3.4+](https://raw.githubusercontent.com/xp-framework/web/master/static/hhvm-3_4plus.png)](http://hhvm.com/)
[![Latest Stable Version](https://poser.pugx.org/xp-forge/wrappers/version.png)](https://packagist.org/packages/xp-forge/wrappers)

This API defines object-oriented API to base types.

Strings
-------

```php
use lang\types\Str;

$greeting= new Str('Hello');

(string)$greeting;               // "Hello"
$greeting->length();             // 5

$greeting->startsWith('Hell');   // TRUE
$greeting->endsWith('lo');       // FALSE
$greeting->contains('ello');     // TRUE

$greeting->indexOf('e');         // 1
$greeting->lastIndexOf('l');     // 3
$greeting->indexOf('a');         // -1

$greeting->concat('World');      // Str("Hello World") - in a new instance
```

Unicode support is realized via either the *mbstring* or *iconv* libraries, whichever is available.

Numbers
-------

```php
use lang\types\Int8;
use lang\types\Int16;
use lang\types\Int32;
use lang\types\Int64;

$number= new Int32(6100);

(string)$number;                 // "6100"

$number->intValue();             // 6100
$number->doubleValue();          // 6100.0

new Int8(9999);                  // *** lang.IllegalArgumentException, out of range
```

64-bit support is realized via the *bcmath* extension on 32-bit platforms and versions of PHP.

```php
use lang\types\Single;
use lang\types\Double;

$number= new Single(1.5);

(string)$number;                 // "1.5"

$number->intValue();             // 1
$number->doubleValue();          // 1.5
$number->round(0);               // 2.0
```

