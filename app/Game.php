<?php

namespace App;

class Game
{
    private array $symbols = [];
    private array $lineValues = [];

//    public function __construct(array $lines)
//    {
//        $this->lines = $lines;
//    }

//    public function getLines(): array
//    {
//        return $this->lines;
//    }

    public function getSymbols(): array
    {
        return $this->symbols;
    }

    public function getLineValues(): array
    {
        return $this->lineValues;
    }

    public function setLineCombinations(array $lineCombinations): array
    {
        $this->lineValues = [];
        foreach ($lineCombinations as $line) {
            foreach ($line as $position) {
                [$x, $y] = $position;
                $this->lineValues [] = [$x, $y];
            }
        }
        return $this->lineValues;
    }

    public function getWin(int $playerCash): int
    {
        $win = 0;
        if (count(array_unique($this->lineValues)) == 1) {
            $win++;
            $playerCash += $this->symbols[$this->lineValues[0]];
        }
        return $playerCash;
    }
}
