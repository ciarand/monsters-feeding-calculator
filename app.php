<?php

if (!$loader = include __DIR__.'/vendor/autoload.php') {
    die('You must set up the project dependencies.');
}

use RestlessCo\MonstersFeedingCalculator\Command\Calculator;

$app = new \Cilex\Application('Monsters Feeding Calculator', '0.1.0');
$app->command(new Calculator());
$app->run();
