<?php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

$filename = $_SERVER["argv"][1];
$config = require $filename;
$ymlDump = Yaml::dump($config, 4);
echo $ymlDump;
echo "==========\n";

echo json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
