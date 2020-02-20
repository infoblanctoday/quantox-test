<?php

namespace ale\app\BoardsExports;

use ale\app\XMLResponse;
/**
 * 
 */
class BoardXML implements BoardsExportsInterface
{
	public function board($student)
	{
		$student['final_result'] = ($student['average'] > 8 ? true : false);

		$student = XMLResponse::generate($student);
		return $student;
	}
}