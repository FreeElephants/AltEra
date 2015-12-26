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
        $command = new ConvertConfigCommand();
        $tester = new CommandTester($command);
        $this->setExpectedException(RuntimeException::class);
        $tester->execute([
            "source" => "foo.php",
            "dist" => "foo.json"
        ]);
    }

    public function testExecuteWithInvalidSourceFormat()
    {
        $command = new ConvertConfigCommand();
        $tester = new CommandTester($command);
        $this->setExpectedException(RuntimeException::class);
        $tester->execute([
            "source" => self::FIXTURE_PATH . "gregorian-month-based-ru.php",
            "dist" => "foo.json",
            "--input-format" => "txt",
        ]);
    }

    public function testExecuteWithInvalidOutputFormat()
    {
        $command = new ConvertConfigCommand();
        $tester = new CommandTester($command);
        $this->setExpectedException(RuntimeException::class);
        $tester->execute([
            "source" => self::FIXTURE_PATH . "gregorian-month-based-ru.php",
            "dist" => "foo.json",
            "--output-format" => "txt",
        ]);

    }
}