<?php

error_reporting(E_ALL);
ini_set('desplay_errors', 1);

require __DIR__ . '/../vendor/autoload.php';

$st = new ale\app\Student();

$boardjson = new ale\app\BoardsExports\BoardJson;
$boardxml = new ale\app\BoardsExports\BoardXML;
$exporter = new ale\app\Board;

$exporter->board($boardjson);
$exporter->board($boardxml);

// var_dump($st->getUserGrades());