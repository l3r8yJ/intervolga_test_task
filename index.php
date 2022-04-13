<?php

require $_SERVER['DOCUMENT_ROOT'] . '/src/lib/database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/src/models/student_model.php';

// try {
//     $model = new StudentModel(new Database('test_task'));
//     $students = $model->readAllStudents();
//     foreach ($students as $student) {
//         echo "<li>id[$student->id] $student->name, $student->surname, $student->birthday</li>";
//     }
// } catch (Exception $e) {
//     echo $e;
// }
