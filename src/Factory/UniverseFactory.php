<?php


namespace byjrubira\GameOfLife\Factory;

use byjrubira\GameOfLife\Game\Matrix;
use byjrubira\GameOfLife\Game\Universe;

class UniverseFactory
{

    public static function makeNewUniverse(Matrix $matrix): Universe
    {
        return new Universe($matrix);
    }

}