<?php
require_once './src/database.php';
require_once './src/controllers/controller.php';
require_once './src/models/model.php';

$database = new Database("test_task");
$model = new Model($database);
$controller = new Controller($model);

$model->createStudent("InsName", "InsSurname", "1999-08-12", "link");
$studs = $model->getStudentsFromDatabase();
var_dump($studs);

foreach ($studs as $stud) {
    echo "<li>$stud[id] $stud[name] $stud[surname]</li>";
}
