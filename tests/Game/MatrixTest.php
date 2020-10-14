<?php

namespace byjrubira\Tests\GameOfLife\Game;

use byjrubira\GameOfLife\Game\Matrix;
use byjrubira\GameOfLife\Factory\CellFactory;
use PHPUnit\Framework\TestCase;

class MatrixTest extends TestCase
{

    /* Testing that the matrix has the specified width and height*/
    public function testfillRandomly()
    {
        $matrix = new Matrix();
        $matrix->fillRandomly(5,5);

        $this->assertEquals(5, count($matrix->getCells()));
        for($i = 0; $i < count($matrix->getCells()); $i++)
        {
            $this->assertEquals(5, count($matrix->getCells()[$i]));
        }
    }

    public function testfillWithArray()
    {
        $cells = [
            [CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
        ];

        $heightLength = count($cells);
        $widthLength = count($cells[0]);

        $matrix = new Matrix();
        $matrix->fillWithArray($cells);

        $this->assertEquals($heightLength, count($matrix->getCells()));
        $this->assertEquals($widthLength, count($matrix->getCells()[0]));

    }

    public function testGetCells()
    {
        $cells = [
            [CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
        ];

        $expectedCells = [
            [0,0,0,0],
            [0,1,1,0],
            [0,1,1,0],
            [0,0,0,0]
        ];

        $matrix = new Matrix();
        $matrix->fillWithArray($cells);

        $this->assertEquals($expectedCells, $matrix->getCells());
    }


    public function testGetOneAliveNeighbour()
    {
        $cells = [
            [CellFactory::getAliveCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
        ];


        $matrix = new Matrix();
        $matrix->fillWithArray($cells);

        // Expected one
        $this->assertEquals(1, $matrix->getAliveNeighbour(0,0));

    }

    public function testGetTwoAliveNeighbour()
    {
        $cells = [
            [CellFactory::getAliveCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getAliveCell()],
        ];


        $matrix = new Matrix();
        $matrix->fillWithArray($cells);

        // Expected one
        $this->assertEquals(2, $matrix->getAliveNeighbour(0,0));

    }

    public function testGetThreeAliveNeighbour()
    {
        $cells = [
            [CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell(), CellFactory::getAliveCell()],
        ];


        $matrix = new Matrix();
        $matrix->fillWithArray($cells);

        // Expected one
        $this->assertEquals(3, $matrix->getAliveNeighbour(0,0));

    }

    public function testGetFourAliveNeighbour()
    {
        $cells = [
            [CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell(), CellFactory::getAliveCell()],
        ];


        $matrix = new Matrix();
        $matrix->fillWithArray($cells);

        // Expected one
        $this->assertEquals(4, $matrix->getAliveNeighbour(1,1));

    }

    public function testGetFiveAliveNeighbour()
    {
        $cells = [
            [CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell()],
            [CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell()],
        ];


        $matrix = new Matrix();
        $matrix->fillWithArray($cells);

        // Expected one
        $this->assertEquals(5, $matrix->getAliveNeighbour(1,1));

    }

    public function testGetSixAliveNeighbour()
    {
        $cells = [
            [CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell()],
            [CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell()],
        ];


        $matrix = new Matrix();
        $matrix->fillWithArray($cells);

        // Expected one
        $this->assertEquals(6, $matrix->getAliveNeighbour(1,1));

    }

    public function testGetSevenAliveNeighbour()
    {
        $cells = [
            [CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell()],
            [CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell(), CellFactory::getDeadCell()],
            [CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell()],
        ];


        $matrix = new Matrix();
        $matrix->fillWithArray($cells);

        // Expected one
        $this->assertEquals(7, $matrix->getAliveNeighbour(1,1));

    }

    public function testGetEightAliveNeighbour()
    {
        $cells = [
            [CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell()],
            [CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell()],
            [CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getDeadCell()],
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell()],
        ];


        $matrix = new Matrix();
        $matrix->fillWithArray($cells);

        // Expected one
        $this->assertEquals(8, $matrix->getAliveNeighbour(1,1));

    }



    public function testTick()
    {

        $cells = [
            [CellFactory::getAliveCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell()],
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell()],
            [CellFactory::getAliveCell(), CellFactory::getDeadCell(), CellFactory::getAliveCell()],
            [CellFactory::getDeadCell(), CellFactory::getAliveCell(), CellFactory::getAliveCell()],
        ];

        $matrix = new Matrix();
        $matrix->fillWithArray($cells);

        $tickMatrix = $matrix->tick();

        $this->assertTrue($tickMatrix->ifCellAliveAt(0,0));
        $this->assertFalse($tickMatrix->ifCellAliveAt(0,1));
        $this->assertTrue($tickMatrix->ifCellAliveAt(0,2));
        $this->assertFalse($tickMatrix->ifCellAliveAt(1,0));
        $this->assertFalse($tickMatrix->ifCellAliveAt(1,1));
        $this->assertFalse($tickMatrix->ifCellAliveAt(1,2));
        $this->assertTrue($tickMatrix->ifCellAliveAt(2,0));
        $this->assertFalse($tickMatrix->ifCellAliveAt(2,1));
        $this->assertFalse($tickMatrix->ifCellAliveAt(2,2));

    }
}