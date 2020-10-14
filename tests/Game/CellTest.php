<?php

namespace byjrubira\Tests\GameOfLife\Game;

use byjrubira\GameOfLife\Game\Cell;
use PHPUnit\Framework\TestCase;

class CellTest extends TestCase
{

    // Basic creation of alive cell
    public function testAliveCreatesAliveCell()
    {
        $cell = new Cell(1);
        $this->assertTrue($cell->imAlive());
    }

    // Basic creation of dead cell
    public function testDeadCreatesDeadCell()
    {
        $cell = new Cell(0);
        $this->assertFalse($cell->imAlive());
    }


    // Testing with alive cells
	public function testCellTickWithOneAliveNeighbours()
    {
        $cell = new Cell(1);
        $newCell = $cell->tick(1);

        $this->assertFalse($newCell->imAlive());
    }
 
    public function testCellTickWithTwoAliveNeighbours()
    {
        $cell = new Cell(1);
        $newCell = $cell->tick(2);

        $this->assertEquals($cell, $newCell);
    }

    public function testCellTickWithThreeAliveNeighbours()
    {
        $cell = new Cell(1);
        $newCell = $cell->tick(3);

        $this->assertEquals($cell, $newCell);
    }

    public function testCellTickWithFourAliveNeighbours()
    {
        $cell = new Cell(1);
        $newCell = $cell->tick(4);

        $this->assertFalse($newCell->imAlive());
    }


    // Testing with dead cells
	
	public function testDeadCellTickWithOneAliveNeighbours()
    {
        $cell = new Cell(0);
        $newCell = $cell->tick(1);

        $this->assertFalse($newCell->imAlive());
    }
	
	public function testDeadCellTickWithTwoAliveNeighbours()
    {
        $cell = new Cell(0);
        $newCell = $cell->tick(2);

        $this->assertFalse($newCell->imAlive());
    }

    public function testDeadCellTickWithThreeAliveNeighbours()
    {
        $cell = new Cell(0);
        $newCell = $cell->tick(3);

        $this->assertTrue($newCell->imAlive());
    }
  
	public function testDeadCellTickWithFourAliveNeighbours()
    {
        $cell = new Cell(0);
        $newCell = $cell->tick(4);

        $this->assertFalse($newCell->imAlive());
    }
}
