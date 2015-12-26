<?php

namespace FreeElephants\Configuration\Writer;

/**
 *
 * @author samizdam
 *
 */
class JsonWriter implements WriterInterface
{

    public function writeFile($filename, $data)
    {
        file_put_contents($filename, $this->toString($data));
    }

    public function toString($data)
    {
        return json_encode($data, JSON_PRETTY_PRINT);
    }
}