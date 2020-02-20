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
	public function getUserGrades($id = 0)
	{
		$exporter = new Board;

		$database = new DB();
		$database->query('SELECT students.name, students.school_board, school_boards.name as boardname FROM students 
			INNER JOIN school_boards ON students.school_board = school_boards.id
			WHERE student_id = :student');

		$database->bind(':student', $id);
		$student = $database->single();

		if ($student) {
			$student['grades'] = $this->getGrades($id);
			if ($student["school_board"] == 1) {
				$exporter->setAverage($student);
				$board = $exporter->board(new BoardJson, $student);
			}else{
				$exporter->setAverage($student);
				$board = $exporter->board(new BoardXML, $student);
			}

			return $board;
		}

		return 404;
	}

	protected function getGrades($id)
	{
		$database = new DB();

		$database->query('SELECT grade FROM grades WHERE student_id = :student');
		$database->bind(':student', $id);

		$grades = [];

		$r = $database->resultset();
		foreach ($r as $grade) {
			$grades[] = (int)$grade["grade"];
		}

		return $grades;
	}
}