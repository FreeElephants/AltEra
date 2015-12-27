<?php

namespace FreeElephants\AltEra\Console\Command;

use FreeElephants\AltEra\AbstractCalendarUnitTestCase;
use Symfony\Component\Console\Tester\CommandTester;
use FreeElephants\AltEra\Console\Exception\RuntimeException;
use Symfony\Component\Console\Application;

/**
 *
 * @author samizdam
 *
 */
class ConvertConfigCommandTest extends AbstractCalendarUnitTestCase
{

    protected function setUp()
    {
        foreach (glob(self::OUTPUT_PATH . "*") as $filename){
            if(basename($filename) === ".gitignore"){
                continue;
            }
            unlink($filename);
        }
        parent::setUp();
    }

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

    public function testExecuteWithOutputFormatFromFilename()
    {
        $command = new ConvertConfigCommand();
        $tester = new CommandTester($command);
        $outputFilename = self::OUTPUT_PATH . "foo.json";
        $this->assertFileNotExists($outputFilename);
        $tester->execute([
            "source" => self::FIXTURE_PATH . "gregorian-month-based-ru.php",
            "dist" => $outputFilename,
        ]);
        $this->assertFileExists($outputFilename);
    }

    public function testExecuteWithShowOutput()
    {
        $command = new ConvertConfigCommand();
        $tester = new CommandTester($command);
        $outputFilename = self::OUTPUT_PATH . "foo.json";
        $tester->execute([
            "source" => self::FIXTURE_PATH . "gregorian-month-based-ru.php",
            "dist" => $outputFilename,
            "--show-output" => true
        ]);
        $this->assertContains('"name": "Григорианский календарь"', $tester->getDisplay(true));
    }

    public function testExecuteWithShowInput()
    {
        $command = new ConvertConfigCommand();
        $tester = new CommandTester($command);
        $outputFilename = self::OUTPUT_PATH . "foo.json";
        $tester->execute([
            "source" => self::FIXTURE_PATH . "gregorian-month-based-ru.php",
            "dist" => $outputFilename,
            "--show-input" => true
        ]);
        $this->assertContains('"name" => "Григорианский календарь"', $tester->getDisplay(true));
    }
}