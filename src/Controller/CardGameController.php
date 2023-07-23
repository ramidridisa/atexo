<?php

namespace App\Controller;

use App\Service\CardService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardGameController extends AbstractController
{
    public function __construct(private CardService $cardService)
    {
    }

    #[Route('/cards', name: 'atexo_index')]
    public function index(): Response
    {
        $handSize = 10;
        $hand = $this->cardService->generateHand($handSize);
        $sortedHand = $this->cardService->sortHand($hand);

        return $this->render('cards/index.html.twig', [
            'handCards' => $hand,
            'colors' => $this->cardService->getColors(),
            'values' => $this->cardService->getValues(),
            'sortedHandCards' => $sortedHand,
        ]);
    }
}
