<?php

namespace FreeElephants\Configuration\Reader;

/**
 *
 * @author samizdam
 *
 */
interface ReaderInterface
{

    /**
     *
     *
     * @param string $filename
     * @return array
     */
    public function readFile($filename);

    /**
     *
     *
     * @param string $input
     * @return array
     */
    public function readString($input);


}