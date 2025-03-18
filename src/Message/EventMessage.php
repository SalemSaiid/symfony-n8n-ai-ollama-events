<?php
// src/Message/EventMessage.php
namespace App\Message;

class EventMessage
{
    private $shortDescription;
    private $startDate;
    private $endDate;

    /**
     * EventMessage constructor.
     * @param string $shortDescription
     * @param string $startDate
     * @param string $endDate
     */
    public function __construct(string $shortDescription, string $startDate, string $endDate)
    {
        $this->shortDescription = $shortDescription;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }


    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }
}

