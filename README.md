# AltEra

This Project implements https://github.com/MagicGreenHat/Kingdom/issues/38 , but can be useful in any php application, that need customizable Calendar (not traditional).  

## Features
- Custom number of named months in year. 
- Custom number of days for every month.
- Seasons are supported. 
- Well designed, implentated via TDD (and therefore 100% covered with tests), compliant with psr's. 

## Usage
Via composer: 

```bash
composer require free-elephants/altera
```

Build new Calendar instanse with Builder:

```php
<?php

use FreeElephants\AltEra\Builder\MonthAwareCalendarBuilder;

// Lets create calendar with 3 differance months
$builder = new MonthAwareCalendarBuilder("3 Months Based Calendar");

$builder->addMonth("first", 10)
		->addMonth("middle", 11)
		->addMonth("last", 12);

$calendar = $builder->getCalendar();
$calendar->getName(); // will return "3 Months Based Calendar"
$calendar->getNumberOfDaysInYear(); // will return "33" - sum of days in all months 

```

## Author

samizdam <samizdam@inbox.ru>
