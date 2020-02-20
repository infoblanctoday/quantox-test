<?php

// Show errors
error_reporting(E_ALL);
ini_set('desplay_errors', 1);

// Require db config and autoloaded classes
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../vendor/autoload.php';

// Check index is defined
if (isset($_GET['student'])) {
	$st = new ale\app\Student();
	echo $st->getUserGrades($_GET['student']);
}else{
	echo 404;
}
