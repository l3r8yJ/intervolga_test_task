<?php
require_once './src/database.php';
require_once './src/controllers/controller.php';
require_once './src/models/model.php';

$database = new Database();
$model = new Model($database);
$controller = new Controller($model);

$studs = $model->getStudentsFromDatabase();

foreach ($studs as $stud) {
    echo "<li>$stud[id] $stud[name] $stud[surname]</li>" . "<img src=\"$stud[photo]\" style=\"width=10%; height=10%;\">";
}
