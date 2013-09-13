<?php

if (!$loader = include __DIR__.'/vendor/autoload.php') {
    die('You must set up the project dependencies.');
}

use RestlessCo\MonstersFeedingCalculator\Command\Calculator;

$app = new \Cilex\Application('Monsters Feeding Calculator', file_get_contents('version'));
$app->command(new Calculator());
$app->run();
