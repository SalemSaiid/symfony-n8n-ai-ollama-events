<?php
namespace App\MessageHandler;

use App\Message\EventMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class EventMessageHandler
{
    public function __invoke(EventMessage $message)
    {
        $startDate= $message->getStartDate();
        $endDate = $message->getEndDate();
        $shortDescription = $message->getShortDescription();

        $webhookUrl = 'http://n8n:5678/webhook-test/event';

        $payload = json_encode([
            'startDate'          => $startDate,
            'endDate'          => $endDate,
            'shortDescription' => $shortDescription
        ]);

        $ch = curl_init($webhookUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);
    }
}
