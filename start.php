<?php

require 'vendor/autoload.php';

use byjrubira\GameOfLife;

// Getting the custom arguments
$width = (int) $argv[1] ?: 20;
$height = (int) $argv[2] ?: 20;
$tickIterations = (int) $argv[3] ?: 20;

$matrix = new GameOfLife\Game\Matrix();
$matrix->fillRandomly($width, $height);
$universe = new GameOfLife\Game\Universe($matrix);
$renderer = new GameOfLife\Render\Render();

for ($tick = 0; $tick < $tickIterations; $tick++)
{

    $renderer->render($universe);
    $universe = $universe->tick();
    usleep(100000);
}
