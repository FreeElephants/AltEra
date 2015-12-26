<?php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use FreeElephants\AltEra\Console\Command\ConvertConfigCommand;

$app = new Application("AltEra Console App");
$app->add(new ConvertConfigCommand("convert-config"));
$app->run();
// $filename = $_SERVER["argv"][1];
// $config = require $filename;
// $ymlDump = Yaml::dump($config, 4);
// echo $ymlDump;
// echo "==========\n";

// echo json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
