<?php

namespace byjrubira\GameOfLife\Game;

use byjrubira\GameOfLife\Factory\CellFactory;

class Matrix
{

    private $cells;

    public function __construct()
    {
        $this->cells = [];

    }

    public function fillRandomly(int $width, int $height): void
    {
        for ($x = 0; $x < $height; $x++)
        {
            for ($y = 0; $y < $width; $y++)
            {
                $this->cells[$x][$y] = mt_rand(0, 1) == 1 ? CellFactory::getAliveCell() : CellFactory::getDeadCell();
            }
        }
    }

    public function fillWithArray(array $cells) : void
    {
        $this->cells = $cells;
    }


    public function getCells(): array
    {
        $matrix = [];

        foreach ($this->cells as $x => $cellY)
        {
            foreach ($cellY as $y => $cellX)
            {
                $matrix[$x][$y] = $this->cells[$x][$y]->imAlive();
            }
        }

        return $matrix;
    }


    public function getAliveNeighbour($x, $y): int
    {
        $n1 = $this->ifCellAliveAt($x-1, $y-1);
        $n2 = $this->ifCellAliveAt($x-1, $y);
        $n3 = $this->ifCellAliveAt($x-1, $y+1);
        $n4 = $this->ifCellAliveAt($x, $y-1);
        $n5 = $this->ifCellAliveAt($x, $y+1);
        $n6 = $this->ifCellAliveAt($x+1, $y-1);
        $n7 = $this->ifCellAliveAt($x+1, $y);
        $n8 = $this->ifCellAliveAt($x+1, $y+1);

        return $n1+$n2+$n3+$n4+$n5+$n6+$n7+$n8;
    }

    private function insideOfBounds($x, $y): int
    {

        return isset($this->cells[$x][$y]);
    }

    public function ifCellAliveAt($x, $y)
    {
        if($this->insideOfBounds($x, $y))
        {
            return $this->cells[$x][$y]->imAlive();
        }
    }

    public function tick(): self
    {
        $matrix = clone $this;

        foreach ($matrix->cells as $x => $cellY) {
            foreach ($cellY as $y => $cellX) {
                $aliveNeighbours = $this->getAliveNeighbour($x, $y);
                $matrix->cells[$x][$y] = $this->cells[$x][$y]->tick($aliveNeighbours);
            }
        }
        return $matrix;
    }
}