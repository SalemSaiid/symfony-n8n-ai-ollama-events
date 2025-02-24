<?php

namespace App\Controller;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Contracts\HttpClient\HttpClientInterface;


final class EventController extends AbstractController
{
    private $bus;
    private $client;
    private $entityManager;

    public function __construct(MessageBusInterface $bus, HttpClientInterface $client, EntityManagerInterface $entityManager)
    {
        $this->bus = $bus;
        $this->client = $client;
        $this->entityManager = $entityManager;
    }

    #[Route('/api/event', name: 'app_add_event', methods: ['POST'])]
    public function addEvent(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $shortDescription = $data['shortDescription'] ?? '';

        $eventId = uniqid('', true);

        $this->bus->dispatch(new \App\Message\EventMessage($eventId, $shortDescription));

        return new JsonResponse(['status' => 'Event created', 'id' => $eventId]);
    }

    #[Route('/api/events', name: 'app_get_events', methods: ['GET'])]
    public function getEvents(\Symfony\Component\Serializer\SerializerInterface $serializer)
    {
        $events = $this->entityManager->getRepository(Event::class)->findAll();

        $jsonContent = $serializer->serialize($events, 'json', ['groups' => 'event:read']);

        return new JsonResponse($jsonContent, 200, [], true);
    }

}

