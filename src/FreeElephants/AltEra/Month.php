<?php
namespace FreeElephants\AltEra;

/**
 *
 * @author samizdam
 *
 */
class Month implements MonthInterface
{

    private $name;

    private $numberOfDays;

    /**
     *
     * @param string $name
     * @param int $numberOfDays
     */
    public function __construct($name, $numberOfDays)
    {
        $this->name = (string) $name;
        $this->numberOfDays = abs((int) $numberOfDays);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNumberOfDays()
    {
        return $this->numberOfDays;
    }
}