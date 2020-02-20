<?php
namespace ale\app;

use ale\app\DB;
use ale\app\Board;
use ale\app\BoardsExports\{BoardJson, BoardXML};

/**
 * 
 */
class Student extends DB
{
	// protected $students = 
	protected $students = [
		1 => [
			"name" => "Alex", 
			"grades" => [
				11,9,3,8
			], 
			"board" => 1,
			"boardname" => "CSM",
			"average" => 0,
			"final_result" => null
		],
		2 => [
			"name" => "Gim", 
			"grades" => [
				6,9,3,8
			], 
			"board" => 2,
			"boardname" => "CSMB",
			"average" => 0,
			"final_result" => null
		]
	];

	public function getUserGrades($id = 0)
	{
		$exporter = new Board;
		
		$database = new DB();
		$database->query('SELECT * FROM students WHERE student_id = :student');
		$database->bind(':student', $id);

		$student = $database->resultset();

		var_dump($student); die;

		$student = $this->students[$id];

		if ($student["school_board"] == 1) {
			$exporter->setAverage($student);
			$board = $exporter->board(new BoardJson, $student);
		}else{
			$exporter->setAverage($student);
			$board = $exporter->board(new BoardXML, $student);
		}

		return $board;
	}
}