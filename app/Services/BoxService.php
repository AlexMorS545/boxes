<?php

namespace App\Services;

class BoxService
{
    const BIG_BOX = 12;
    const MEDIUM_BOX = 6;
    const SMALL_BOX = 3;

    public function getCountBoxMessage(int $countBottle): string
    {
        if ($countBottle === 0) return $countBottle . ' ящиков';

        $result = '';

        $bigBox = floor($countBottle / self::BIG_BOX);
        $excess = $countBottle % self::BIG_BOX;

        $result .= ($bigBox > 0) ? $this->getText($bigBox, 'box') . ' ' . $this->getText(self::BIG_BOX, 'bottle') . ', ' : '';

        $mediumBox = floor($excess / self::MEDIUM_BOX);
        $excess = $excess % self::MEDIUM_BOX;

        $smallBox = 0;

        if ($excess > self::SMALL_BOX && $excess <= self::MEDIUM_BOX) {
            $mediumBox++;
        }
        if ($excess > 0 && $excess <= self::SMALL_BOX) {
            $smallBox++;
        }

        $result .= ($mediumBox > 0) ? $this->getText($mediumBox, 'box') . ' ' . $this->getText(self::MEDIUM_BOX, 'bottle') . ', ' : '';
        $result .= ($smallBox > 0) ? $this->getText($smallBox, 'box') . ' ' . $this->getText(self::SMALL_BOX, 'bottle') . ', ' : '';

        return $result;
    }

    private function getText(int $count, string $key): string
    {
        $words = [
            'box' => ':count ящик|:count ящика|:count ящиков',
            'bottle' => ':count бутылка|:count бутылки|:count бутылок'
        ];
        return trans_choice($words[$key], $count);
    }
}
