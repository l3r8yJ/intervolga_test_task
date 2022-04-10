<?php
require_once './src/database.php';
require_once './src/controllers/controller.php';
require_once './src/models/model.php';

$database = new Database();
$model = new Model($database);
$controller = new Controller($model);

$studs = $model->findStudentsByName("First");
var_dump($studs);

foreach ($studs as $stud) {
    echo "<li>$stud[id] $stud[name] $stud[surname]</li>";
}
