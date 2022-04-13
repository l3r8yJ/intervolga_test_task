<?php

require $_SERVER['DOCUMENT_ROOT'] . '/src/lib/database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/src/models/student_model.php';

$model = new StudentModel();

$students = $model->readAllStudents();

foreach ($students as $student) {
    echo "<li>id[$student->id] $student->name, $student->surname, $student->birthday</li>";
}

echo "------";
// $params['name'] = 'nameP';
// $params['surname'] = 'surname';
// $params['birthday'] = '1995-12-05';
// $params['photo'] = 'photo';

try {
    $model->deleteStudent(8);
} catch (Exception$e) {
    echo $e;
}

foreach ($students as $student) {
    echo "<li>id[$student->id] $student->name, $student->surname, $student->birthday</li>";
}
