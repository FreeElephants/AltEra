<?php

namespace FreeElephants\AltEra\Console\Command;

use FreeElephants\AltEra\AbstractCalendarUnitTestCase;
use Symfony\Component\Console\Tester\CommandTester;
use FreeElephants\AltEra\Console\Exception\RuntimeException;

/**
 *
 * @author samizdam
 *
 */
class ConvertConfigCommandTest extends AbstractCalendarUnitTestCase
{
    public function testExecuteWithNonExistingSourceFile()
    {
        $command = new ConvertConfigCommand("foo");
        $tester = new CommandTester($command);
        $this->setExpectedException(RuntimeException::class);
        $tester->execute([
            "source" => "foo.php",
            "dist" => "foo.json"
        ]);
    }
}