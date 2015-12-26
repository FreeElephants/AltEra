<?php

namespace FreeElephants\Configuration\Writer;

use FreeElephants\Configuration\FormatEnum;

/**
 *
 * @author samizdam
 *
 */
class WriterFactory implements FormatEnum
{

    /**
     *
     *
     * @param string $format
     * @throws \DomainException
     * @return WriterInterface
     */
    public function createWriter($format)
    {
        switch($format)
        {
            case self::FORMAT_JSON:
                $writer = new JsonWriter();
                break;
            case self::FORMAT_PHP:
                $writer = new PhpWriter();
                break;
            case self::FORMAT_YAML:
                $writer = new YamlWriter();
                break;
            default:
                throw new \DomainException("Not supported format. ");
        }

        return $writer;
    }
}