<?php

namespace FreeElephants\AltEra\Builder;

use FreeElephants\AltEra\AbstractCalendarUnitTestCase;
use FreeElephants\AltEra\TimeUnit\MonthInterface;
use FreeElephants\AltEra\Exception\InvalidConfigurationException;

/**
 *
 * @author samizdam
 *
 */
class SeasonAwareCalendarBuilderTest extends AbstractCalendarUnitTestCase
{

    public function testSetCalendarName()
    {
        $builder = new SeasonAwareCalendarBuilder();
        $builder->setCalendarName("Foo");
        $this->assertEquals("Foo", $builder->buildCalandar()->getName());
    }

    public function testSetFirstMonthByName()
    {

        $firstMonth = $this->getMock(MonthInterface::class);
        $firstMonth->method("getName")->willReturn("first");
        $secondMonth = $this->getMock(MonthInterface::class);
        $secondMonth->method("getName")->willReturn("second");
        $zeroMonth = $this->getMock(MonthInterface::class);
        $zeroMonth->method("getName")->willReturn("zero");
        $months = [
            $firstMonth,
            $secondMonth,
            $zeroMonth,
        ];

        $builder = new SeasonAwareCalendarBuilder();
        $builder->addSeason("Foo", $months);
        $builder->setFirstMonthByName("zero");

        $this->assertEquals($zeroMonth, $builder->buildCalandar()->getMonths()[0]);

    }

    public function testSetFirstMonthByNameWithInvalidValue()
    {
        $firstMonth = $this->getMock(MonthInterface::class);
        $firstMonth->method("getName")->willReturn("first");
        $months = [
            $firstMonth
        ];
        $builder = new SeasonAwareCalendarBuilder();
        $builder->addSeason("Foo", $months);
        $builder->setFirstMonthByName("zero");
        $this->setExpectedException(InvalidConfigurationException::class);
        $builder->buildCalandar();
    }
}