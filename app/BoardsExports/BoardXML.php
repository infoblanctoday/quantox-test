<?php

namespace ale\app\BoardsExports;

use ale\app\XMLResponse;

/**
 * Returns a board according to the interface
 */
class BoardXML implements BoardsExportsInterface
{
	public function board($student)
	{
		// Setting final result
		$student['final_result'] = ($student['average'] > 8 ? 'Passed' : 'Falied');

		// Generates xml response
		$student = XMLResponse::generate($student);
		return $student;
	}
}