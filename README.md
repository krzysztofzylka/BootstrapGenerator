# Bootstrap 5.3 generator
## Install
```bash
composer install krzysztofzylka/bootstra-generator
```

## Class
```php
\krzysztofzylka\BootstrapGenerator\BootstrapGenerator
```

## Methods

### Alert
```php
use \krzysztofzylka\BootstrapGenerator\BootstrapGenerator;
use \krzysztofzylka\BootstrapGenerator\enum\ThemeColor;

BootstrapGenerator::alert('alert!', ThemeColor::Primary)
    //not required additional methods
    ->header('header') //alert header
    ->headerTag('h4'); //custom header tag
```

### Badge
```php
use \krzysztofzylka\BootstrapGenerator\BootstrapGenerator;
use \krzysztofzylka\BootstrapGenerator\enum\BackgroundColor;

BootstrapGenerator::badge('badge!', BackgroundColor::Primary)
    //not required additional method
    ->roundedPill(); //rounded
```

### Breadcrumb
```php
use \krzysztofzylka\BootstrapGenerator\BootstrapGenerator;

BootstrapGenerator::breadcrumb()
    ->addBreadcrumb('a', 'true', '#')
    ->...;
```

### Button
```php
use \krzysztofzylka\BootstrapGenerator\BootstrapGenerator;
use \krzysztofzylka\BootstrapGenerator\enum\ThemeColor;
use \krzysztofzylka\BootstrapGenerator\enum\Size;

BootstrapGenerator::button('button!', ThemeColor::Primary)
    //not required additional method
    ->tag('div')
    ->size(Size::Sm)
    ->disable()
    ->badge('badge', ThemeColor::Secondary)
```