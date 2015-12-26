<?php

namespace FreeElephants\Configuration\Reader;

/**
 *
 * @author samizdam
 *
 */
class PhpReader implements ReaderInterface
{

    public function readFile($filename)
    {
        return require $filename;
    }

    public function readString($input)
    {
        return unserialize($input);
    }

}