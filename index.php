<?php
require_once './src/database.php';
require_once './src/controllers/controller.php';
require_once './src/models/model.php';

$database = new Database("test_task");
$model = new Model($database);
$controller = new Controller($model);

// $model->createStudent("InsNameParam", "InsSurnameParam", "2003-02-11", "linkParam");
$studs = $model->getStudentsFromDatabase();
var_dump($studs);

foreach ($studs as $stud) {
    echo "<li>$stud[id] $stud[name] $stud[surname]</li>";
}
