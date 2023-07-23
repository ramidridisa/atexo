<?php

namespace App\Service;

class CardService
{
    private $colors = ['Carreaux', 'Coeur', 'Pique', 'Trèfle'];
    private $values = ['As', '5', '10', '8', '6', '7', '4', '2', '3', '9', 'Dame', 'Roi', 'Valet'];

    public function sortHand(array $hand): array
    {
        usort($hand, function ($card1, $card2) {
            $colorComparison = array_search($card1['color'], $this->colors) - array_search($card2['color'], $this->colors);
            if ($colorComparison !== 0) {
                return $colorComparison;
            }
            return array_search($card1['value'], $this->values) - array_search($card2['value'], $this->values);
        });

        return $hand;
    }

    public function generateHand(int $handSize): array
    {
        $hand = [];
        for ($i = 0; $i < $handSize; $i++) {
            $color = $this->colors[array_rand($this->colors)];
            $value = $this->values[array_rand($this->values)];
            $hand[] = ['color' => $color, 'value' => $value];
        }
        return $hand;
    }

    public function getColors(): array
    {
        return $this->colors;
    }

    public function getValues(): array
    {
        return $this->values;
    }
}
