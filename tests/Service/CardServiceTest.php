<?php

namespace App\Tests\Service;

use App\Service\CardService;
use PHPUnit\Framework\TestCase;

class CardServiceTest extends TestCase
{
    private $cardService;

    protected function setUp(): void
    {
        $this->cardService = new CardService();
    }

    public function testSortHand(): void
    {
        $hand = [
            ['color' => 'Coeur', 'value' => 'As'],
            ['color' => 'Carreaux', 'value' => 'Roi'],
            ['color' => 'Trèfle', 'value' => '8'],
        ];

        $sortedHand = $this->cardService->sortHand($hand);

        $expectedSortedHand = [
            ['color' => 'Carreaux', 'value' => 'Roi'],
            ['color' => 'Coeur', 'value' => 'As'],
            ['color' => 'Trèfle', 'value' => '8'],
        ];

        $this->assertEquals($expectedSortedHand, $sortedHand);
    }

    public function testGenerateHand(): void
    {
        $handSize = 5;
        $hand = $this->cardService->generateHand($handSize);

        $this->assertCount($handSize, $hand);
        foreach ($hand as $card) {
            $this->assertArrayHasKey('color', $card);
            $this->assertArrayHasKey('value', $card);
        }
    }

    public function testGetColors(): void
    {
        $colors = $this->cardService->getColors();
        $expectedColors = ['Carreaux', 'Coeur', 'Pique', 'Trèfle'];

        $this->assertEquals($expectedColors, $colors);
    }

    public function testGetValues(): void
    {
        $values = $this->cardService->getValues();
        $expectedValues = ['As', '5', '10', '8', '6', '7', '4', '2', '3', '9', 'Dame', 'Roi', 'Valet'];

        $this->assertEquals($expectedValues, $values);
    }
}
