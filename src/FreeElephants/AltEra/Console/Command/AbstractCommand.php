<?php

namespace FreeElephants\AltEra\Console\Command;

use Symfony\Component\Console\Command\Command;

/**
 *
 * @author samizdam
 *
 */
abstract class AbstractCommand extends Command
{
    public function __construct($name = null)
    {
        $name = $name ? $name : $this->getDefaultName();
        parent::__construct($name);
    }

    abstract public function getDefaultName();
}