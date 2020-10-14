<?php

namespace byjrubira\GameOfLife\Factory;

use byjrubira\GameOfLife\Game\Cell;

class CellFactory
{

    public static function getAliveCell(): Cell
    {
        return new Cell(1);
    }

    public static function getDeadCell(): Cell
    {
        return new Cell(0);
    }
}