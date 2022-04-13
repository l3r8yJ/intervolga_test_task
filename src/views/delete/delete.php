<?php

echo "DELETE SIMULATION";

require '../../models/student_model.php';
require '../../lib/database.php';

$model = new StudentModel(new Database('test_task'));
$model->openConnection();

$id = (int) $_GET['id'];
$model->deleteStudent($id);
$model->closeConnection();
header('Location: /');
