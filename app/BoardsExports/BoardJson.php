<?php

namespace ale\app\BoardsExports;

/**
 * 
 */
class BoardJson implements BoardsExportsInterface
{
	public function board($student)
	{
		$student['final_result'] = ($student['average'] >= 7 ? true : false);
		return json_encode($student);
	}
}