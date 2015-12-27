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
        // TODO configure options via special method
        $options = JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE;
        return json_encode($data, $options);
    }
}