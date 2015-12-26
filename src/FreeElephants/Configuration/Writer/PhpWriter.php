<?php

namespace FreeElephants\Configuration\Writer;

/**
 *
 * @author samizdam
 *
 */
class PhpWriter implements WriterInterface
{

    public function writeFile($filename, $data)
    {
        file_put_contents($filename, $this->toString($data));
    }

    public function toString($data)
    {
        return var_export($data, true);
    }

}