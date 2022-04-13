<?php

require $_SERVER['DOCUMENT_ROOT'] . '/src/lib/database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/src/models/student_model.php';

$model = new StudentModel(new Database('test_task'));
$model->openConnection();
$students = $model->readAllStudents();

foreach ($students as $student) {
    echo $student->name . ' ' . $student->surname;
}

try {
    $model->createStudent(['testNAME', 'testSURNAME', '1995-12-05', 'testPhoto']);
} catch (Exception $e) {
    echo $e->getMessage();
}

foreach ($students as $student) {
    echo $student->name . ' ' . $student->surname;
}
