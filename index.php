<?php

require $_SERVER['DOCUMENT_ROOT'] . '/src/lib/database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/src/models/student_model.php';

$model = new StudentModel(new Database('test_task'));
$students = $model->readAllStudents();

foreach ($students as $student) {
    echo $student->name . ' ' . $student->surname;
}
