<?php

namespace ale\app;

use ale\app\BoardsExports\BoardsExportsInterface;

/**
 * 
 */
class Board
{
	public function board(BoardsExportsInterface $b, $student)
	{
		$student = self::setAverage($student);
		return $b->board($student);
	}

	public function setAverage($student)
	{
		$grades = $student['grades'];

		if ($student['school_board'] == 2 && count($grades) > 2) {
			sort($grades, SORT_NUMERIC);
			array_shift($grades);
		}

		$student['average'] = array_sum($grades) / count($grades);

		return $student;
	}
}