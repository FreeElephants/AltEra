<?php

namespace FreeElephants\Configuration\Reader;

/**
 *
 * @author samizdam
 *
 */
class JsonReader implements ReaderInterface
{

    public function readFile($filename)
    {
        $input = file_get_contents($filename);
        return $this->readString($input);
    }

    public function readString($input)
    {
        return json_decode($input, JSON_OBJECT_AS_ARRAY);
    }
}