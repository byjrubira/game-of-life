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

    /**
    * Fills a random matrix
    * @param int $width the number of the matrix rows
    * @param int $height the number of the matrix columns
    * @return void
    */
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

    /**
    * Creates a matrix with a given array
    * @param array $cells Array with the matrix. The array must contais objects type Cell
    * @return void
    */
    public function fillWithArray(array $cells) : void
    {
        $this->cells = $cells;
    }


    /**
    * Returns an array with the status of the cells
    * @return array Contains the status of the cells (1 for alive, 0 for dead cells)
    */
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

    /**
    * Returns the number of alive neighbours from a given position
    * @param int $x Position of the cell on the rows of the matrix
    * @param int $y Position of the cell on the columns of the matrix
    * @return int The number of the alive neighbours
    */
    public function getAliveNeighbour(int $x, int $y): int
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

    /**
    * Returns if the coordenates are inside the bounds of the matrix
    * @param int $x Position of the cell on the rows of the matrix
    * @param int $y Position of the cell on the columns of the matrix
    * @return bool true or false if the coordinates are inside the bounds
    */
    private function insideOfBounds(int $x, int $y): bool
    {

        return isset($this->cells[$x][$y]);
    }

    /**
    * Return if the  cell is alive at the given coordinates
    * @param int $x Position of the cell on the rows of the matrix
    * @param int $y Position of the cell on the columns of the matrix
    * @return bool true or false if cell is alive
    */
    public function ifCellAliveAt(int $x, int $y): int
    {
        if($this->insideOfBounds($x, $y))
        {
            return $this->cells[$x][$y]->imAlive()?1:0;
        }
    }

    /**
    * Iterates in the matrix and makes a tick for every cell
    * @return Matrix The matrix with the new cells
    */
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
