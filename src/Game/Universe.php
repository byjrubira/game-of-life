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

    /**
    * Returns the matrix of the universe
    * @return Matrix
    */
    public function getMatrix(): Matrix
    {
        return $this->matrix;
    }

    /**
    * Tick the universe
    * @return Universe
    */
    public function tick(): self
    {
        return UniverseFactory::makeNewUniverse($this->matrix->tick());
    }
}
