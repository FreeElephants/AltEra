<?php

namespace FreeElephants\AltEra\Console\Exception;

use FreeElephants\AltEra\Exception\CalendarExceptionInterface;

/**
 *
 * @author samizdam
 *
 */
class RuntimeException extends \Symfony\Component\Console\Exception\RuntimeException implements CalendarExceptionInterface
{
}