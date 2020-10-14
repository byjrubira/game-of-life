<?php

namespace byjrubira\GameOfLife\Game;


use byjrubira\GameOfLife\Factory\UniverseFactory;

class Universe
{
    private $matrix;

    public function __construct(Matrix $matrix)
    {
        $this->matrix = $matrix;
    }

    public function getMatrix()
    {
        return $this->matrix;
    }

    public function tick(): Universe
    {
        return UniverseFactory::makeNewUniverse($this->matrix->tick());
    }
}