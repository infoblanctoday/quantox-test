<?php

namespace ale\app\BoardsExports;

/**
 * Returns a board according to the interface
 */
class BoardJson implements BoardsExportsInterface
{
	public function board($student)
	{
		// Setting final result
		$student['final_result'] = ($student['average'] >= 7 ? 'Passed' : 'Falied');
		
		// Adding header to return json response
		header('Content-Type: application/json; charset=utf-8');
		return json_encode($student);
	}
}