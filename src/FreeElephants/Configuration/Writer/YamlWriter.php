<?php

namespace FreeElephants\Configuration\Writer;

use Symfony\Component\Yaml\Yaml;

/**
 *
 * @author samizdam
 *
 */
class YamlWriter implements WriterInterface
{

    public function writeFile($filename, $data)
    {
        file_put_contents($filename, $this->toString($data));
    }

    public function toString($data)
    {
        // TODO configure options via special method
        return Yaml::dump($data, 4);
    }
}