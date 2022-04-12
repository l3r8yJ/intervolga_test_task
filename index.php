<?php
require_once './src/database.php';
require_once './src/controllers/controller.php';
require_once './src/models/model.php';

$database = new Database("test_task");
$model = new Model($database);
$controller = new Controller($model);

$studs = $controller->getAllStudents();
include $_SERVER['DOCUMENT_ROOT'] . "/src/views/default.php";

if (isset($_GET['nameOrSurname'])) {
    $studs = $controller->search($_GET['nameOrSurname']);
} else {
    $studs = $controller->getAllStudents();
}
