<?php

namespace ale\app;

use ale\app\BoardsExports\BoardsExportsInterface;

/**
 * 
 */
class Board
{
	public function board(BoardsExportsInterface $boardExport)
	{
		$boardExport->board();
	}
}