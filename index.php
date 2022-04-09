<?php
require_once './src/database.php';
require_once './src/controllers/controller.php';
require_once './src/models/model.php';

$database = new Database();
$model = new Model($database);

$connection = $database->openConnection();

$students = $model->putStudents();

foreach ($students as $student) {
    print_r($student);
}
