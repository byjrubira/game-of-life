<?php

namespace byjrubira\Tests\GameOfLife\Game;

use byjrubira\GameOfLife\Factory\CellFactory;
use byjrubira\GameOfLife\Game\Matrix;
use PHPUnit\Framework\TestCase;
use byjrubira\GameOfLife\Game\Universe;

class UniverseTest extends TestCase
{

    public function testGetMatrix()
    {
        $matrix = new Matrix();
        $matrix->fillRandomly(5,5);
        $universe = new Universe($matrix);

        $this->assertEquals(
            $matrix->getCells(),
            $universe->getMatrix()->getCells()
        );
    }


    /* Testing a case which doesnt change his status */
    public function testTickInmutable()
    {

        $cells = [
            [CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
        ];

        $expectedCells = [
            [false,false,false,false],
            [false,true,true,false],
            [false,true,true,false],
            [false,false,false,false],
        ];

        $matrix = new Matrix();
        $matrix->fillWithArray($cells);

        $universe = new Universe($matrix);
        $newUniverse = $universe->tick();

        $this->assertEquals($expectedCells, $newUniverse->getMatrix()->getCells());
    }


    /* Period and known pattern */
    public function testTickPeriodStatus()
    {
        $cells = [
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell()],
        ];

        $expectedCells = [
            [false,false,false],
            [true,true,true],
            [false,false,false],
        ];

        $matrix = new Matrix();
        $matrix->fillWithArray($cells);

        $universe = new Universe($matrix);
        $newUniverse = $universe->tick();

        $this->assertEquals($expectedCells, $newUniverse->getMatrix()->getCells());

    }
}
