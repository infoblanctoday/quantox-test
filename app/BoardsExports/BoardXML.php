<?php

namespace ale\app\BoardsExports;

/**
 * 
 */
class BoardXML implements BoardsExportsInterface
{
	public function board($student)
	{
		$student['final_result'] = ($student['average'] > 8 ? true : false);
		return $student;
	}
}