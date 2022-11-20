<?php

namespace App;

class Symbols
{
    private string $symbol;
    private int $value;

    public function __construct(string $symbol, int $value)
    {
        $this->symbol = $symbol;
        $this->value = $value;
    }

    public function getSymbols(): string
    {
        return $this->symbol;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
