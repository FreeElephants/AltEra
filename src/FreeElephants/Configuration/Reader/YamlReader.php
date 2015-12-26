<?php

namespace FreeElephants\Configuration\Reader;

use Symfony\Component\Yaml\Yaml;

/**
 *
 * @author samizdam
 *
 */
class YamlReader implements ReaderInterface
{

    public function readFile($filename)
    {
        $input = file_get_contents($filename);
        return $this->readString($input);
    }

    public function readString($input)
    {
        return Yaml::parse($input);
    }
}