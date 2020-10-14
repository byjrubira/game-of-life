<?php

namespace byjrubira\GameOfLife\Render;

use byjrubira\GameOfLife\Game\Universe;

class Render
{

    public function __construct()
    {
    }

    public function render(Universe $universe)
    {

        echo PHP_EOL;

        $cells = $universe->getMatrix()->getCells();
        $allCellsAreDead = true;
        foreach ($cells as $x => $cell_axis_y) {
            foreach ($cell_axis_y as $y => $cell_axis_x) {
                if ($cells[$x][$y] > 0) {
                    $allCellsAreDead = false;
                    echo '[+]';
                } else {
                    echo '[ ]';
                }
            }
            echo PHP_EOL;
        }

        if ($allCellsAreDead) {
            die("End of game because all the cells are dead");
        }
    }
}
