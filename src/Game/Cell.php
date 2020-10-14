<?php

namespace byjrubira\GameOfLife\Game;

use byjrubira\GameOfLife\Factory\CellFactory;

class Cell
{
    private $alive;

    public function __construct(int $alive)
    {
        if ($alive < 0 || $alive > 1) {
            throw new \InvalidArgumentException(
                sprintf('Life has to be between 0-1. The value given was %d .',  $alive)
            );
        }

        $this->alive = $alive;
    }

    public function imAlive(): bool
    {
        return $this->alive;
    }


    public function tick(int $aliveNeighbors): self
    {
        if ($this->imAlive())
        {
            if($aliveNeighbors == 2 || $aliveNeighbors == 3)
            {
                return CellFactory::getAliveCell();
            }else{
                return CellFactory::getDeadCell();
            }
        }else{
            if($aliveNeighbors == 3)
            {
                return CellFactory::getAliveCell();
            }else{
                return CellFactory::getDeadCell();
            }
        }
    }
}