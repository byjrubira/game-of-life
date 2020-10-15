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
    
    /**
    * Returns a bool whether if the cell is alive or not
    * @return bool 
    */
    public function imAlive(): bool
    {
        return $this->alive;
    }

    /**
    * Make a tick depending the alive neighbours
    * @param int $aliveNeighbours the number of the alive neighbours round the cell.
    * @return Cell object with the new status
    */
    public function tick(int $aliveNeighbours): self
    {
        if ($this->imAlive())
        {
            if($aliveNeighbours == 2 || $aliveNeighbours == 3)
            {
                return CellFactory::getAliveCell();
            }else{
                return CellFactory::getDeadCell();
            }
        }else{
            if($aliveNeighbours == 3)
            {
                return CellFactory::getAliveCell();
            }else{
                return CellFactory::getDeadCell();
            }
        }
    }
}
