<?php

require $_SERVER['DOCUMENT_ROOT'] . '/src/lib/database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/src/models/student_model.php';

$model = new StudentModel(new Database('test_task'));
$model->openConnection();
$_POST['model'] = $model;
$list = $model->readAllStudents();

include $_SERVER['DOCUMENT_ROOT'] . '/src/views/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/src/views/create/form.php';
