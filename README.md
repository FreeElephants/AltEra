# AltEra

This Project implements https://github.com/MagicGreenHat/Kingdom/issues/38 , but can be useful in any php application, that need customizable Calendar (not traditional).  

## Features
- Custom number of named months in year. 
- Custom number of days for every month.
- Standalone library without any dependencies. 
- Well designed, implentated via TDD, compliant with psr's. 

## Usage

Build new Calendar instanse with Builder:

`
<?php

use FreeElephants\AltEra\CalendarBuilder;

$builder = new CalendarBuilder();
// Lets create calendar with 3 months
$builder->addMonth("first", 10);
$builder->addMonth("middle", 11);
$builder->addMonth("last", 12);



`

## Author

samizdam <samizdam@inbox.ru>