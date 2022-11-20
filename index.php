<?php

require_once 'vendor/autoload.php';

use App\Symbols;
use App\Playground;
use App\Player;
use App\Game;

$lines = [
//    horizontal
    [[0, 0], [0, 1], [0, 2], [0, 3], [0, 4]],
    [[1, 0], [1, 1], [1, 2], [1, 3], [1, 4]],
    [[2, 0], [2, 1], [2, 2], [2, 3], [2, 4]],
//    float
    [[0, 0], [0, 1], [1, 2], [0, 3], [0, 4]],
    [[2, 0], [2, 1], [1, 2], [2, 3], [2, 4]],
//    V type
    [[0, 0], [1, 1], [2, 2], [1, 3], [0, 4]],
    [[2, 0], [1, 1], [0, 2], [1, 3], [2, 4]],
//    U type
    [[1, 0], [0, 1], [0, 2], [0, 3], [1, 4]],
    [[1, 0], [2, 1], [2, 2], [2, 3], [1, 4]],
//    step
    [[2, 0], [2, 1], [1, 2], [1, 3], [1, 4]],
    [[0, 0], [0, 1], [1, 2], [1, 3], [1, 4]],
//    zig-zag
    [[2, 0], [1, 1], [1, 2], [1, 3], [0, 4]],
];

$symbolA = new Symbols('A', 10);
$symbolK = new Symbols('K', 9);
$symbolQ = new Symbols('Q', 8);
$symbolJ = new Symbols('J', 7);
$symbol10 = new Symbols('10', 6);
$symbol9 = new Symbols('9', 5);
$symbol8 = new Symbols('8', 4);
$symbol7 = new Symbols('7', 3);
$symbol6 = new Symbols('6', 2);

$symbols = [
    $symbolA->getSymbols(),
    $symbolK->getSymbols(),
    $symbolQ->getSymbols(),
    $symbolJ->getSymbols(),
    $symbol10->getSymbols(),
    $symbol9->getSymbols(),
    $symbol8->getSymbols(),
    $symbol7->getSymbols(),
    $symbol6->getSymbols()
];

$playBoard = new Playground();
$COST_PER_SPIN = 1;

echo "WELCOME TRAVELER!". PHP_EOL;
echo "Would you like to test your luck?" . PHP_EOL;
$selection = (int)readline("1. Yes!" . "    2. No!") . PHP_EOL;

if ($selection == 1) {
    echo "Let's get started!" . PHP_EOL;;
} elseif ($selection == 2) {
    $quittingGame = (int)readline("Do you want to quit?" . PHP_EOL .
        "   1. Yes!" .
        "   2. No!");
    if ($quittingGame == 1) {
        echo "See you soon" . PHP_EOL;
        exit;
    } else {
        echo "Alright! Let's have some fun!" . PHP_EOL;
    }
}

$playerCash = (int)readline("Please make a deposit: $");

$player = new Player($playerCash);
echo "Your initial balance: $" . $playerCash . PHP_EOL;

//  ir problēmas ar spēles laukuma izvadīšanu
foreach ($playBoard->getPlayGround($symbols) as $row) {
    echo $playGround = implode(' | ', $row) . PHP_EOL;
}

$game = new Game();
var_dump($game->setLineCombinations($lines));//die;

while ($playerCash > 0) {
    echo $spin = (int)readline("Spin? " .
        "   1. Yes? " .
        "   2. No.");
    if ($spin == 1) {
//        $playBoard->getPlayGround($symbols);
        echo "Your cash: $" . $playerCash . PHP_EOL;
    } else {
        $exit = (int)readline("Do you want to quit? " .
            "   1. Yes! " .
            "   2. No.");
            if ($exit == 1) {
                echo "Your cash: $" . $playerCash . PHP_EOL;
                echo "See you soon!" . PHP_EOL;
                break;
            } else {
                echo "Let's continue!" . PHP_EOL;
//                $playBoard->getPlayGround($symbols);
            }
    }

    $playerCash -= $COST_PER_SPIN;
    $game->getWin($playerCash);

    if ($playerCash == 0) {
        echo "You have no money left in your portfolio :(";
        echo "See you next time!";
        exit;
    }
}
