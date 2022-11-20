<?php

namespace App;

class Playground
{
    private array $playGround = [];

    public function getPlayGround(array $symbols): array
    {
        $this->playGround = [];
        $rows = 3;
        $columns = 5;

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                $this->playGround[$rows] [] = $symbols[array_rand($symbols)];
            }
        }

//        foreach ($this->playGround as $row) {
//            return $playGround = implode(' | ', $row) . PHP_EOL;
//        }
        return $this->playGround;
    }
}