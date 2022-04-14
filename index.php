<?php

require $_SERVER['DOCUMENT_ROOT'] . '/src/lib/database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/src/models/student_model.php';

$model = new StudentModel(new Database('test_task'));
$model->openConnection();

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['birthday']) && isset($_POST['photo'])) {
    try {
        $id = $model->createStudent([
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'birthday' => $_POST['birthday'],
            'photo' => $_POST['photo'],
        ]);

        if (!$id) {
            die('Could not create student');
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

$_POST['model'] = $model;
$list = $model->readAllStudents();

include $_SERVER['DOCUMENT_ROOT'] . '/src/views/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/src/views/create/form.php';

$model->closeConnection();
