<?php
// src/Message/EventMessage.php
namespace App\Message;

class EventMessage
{
    private $eventId;
    private $shortDescription;

    public function __construct(string $eventId, string $shortDescription)
    {
        $this->eventId = $eventId;
        $this->shortDescription = $shortDescription;
    }

    public function getEventId(): string
    {
        return $this->eventId;
    }

    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }
}

