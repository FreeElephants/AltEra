<?php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use FreeElephants\AltEra\Console\Command\ConvertConfigCommand;

$app = new Application("AltEra Console App");
$app->add(new ConvertConfigCommand());
$app->run();