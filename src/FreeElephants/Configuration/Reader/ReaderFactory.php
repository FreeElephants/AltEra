<?php

namespace FreeElephants\Configuration\Reader;

use FreeElephants\Configuration\FormatEnum;

/**
 *
 * @author samizdam
 *
 */
class ReaderFactory implements FormatEnum
{

    /**
     *
     *
     * @param string $format
     * @throws \DomainException
     * @return ReaderInterface
     */
    public function createReader($format)
    {
        switch($format)
        {
            case self::FORMAT_JSON:
                $reader = new JsonReader();
                break;
            case self::FORMAT_YAML:
                $reader = new YamlReader();
                break;
            case self::FORMAT_PHP:
                $reader = new PhpReader();
                break;
            default:
                throw new \DomainException("Not supported format.");
        }
        return $reader;
    }

}