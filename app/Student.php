<?php
namespace ale\app;

/**
 * 
 */
class Student
{

	protected $name = 'Alex';
	protected $board = 1;
	protected $grades = [11,9,3,8];

	public function getUserGrades()
	{
		return $this->grades;
	}

}