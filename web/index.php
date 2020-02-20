<?php

error_reporting(E_ALL);
ini_set('desplay_errors', 1);

require __DIR__ . '/../config/db.php';
require __DIR__ . '/../vendor/autoload.php';

$st = new ale\app\Student();

echo $st->getUserGrades($_GET['student']);