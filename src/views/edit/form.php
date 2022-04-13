<?php

require '../../models/student_model.php';
require '../../lib/database.php';

$model = new StudentModel(new Database('test_task'));
$model->openConnection();

$id = (int) $_GET['id'];

$currentStudent = $model->readStudentById($id);

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['birthday'])) {

    try {
        $name = htmlspecialchars($_POST['name']);
        $surname = htmlspecialchars($_POST['surname']);
        $birthday = htmlspecialchars($_POST['birthday']);
        $model->updateStudent($id, ['name' => $name, 'birthday' => $birthday, 'surname' => $surname, 'birthday' => $birthday]);
        $model->closeConnection();
        header('Location: /');

    } catch (Exception $e) {
        echo 'Error updating student: ' . $e->getMessage();
    }
}
?>


<form action="" method="post">
  <p>Name: </p>
  <input type="text" name="name" value="<?=$currentStudent->name;?>"></input>
  <p>Surname: </p>
  <input type="text" name="surname" value="<?=$currentStudent->surname;?>"></input>
  <p>Birthday: </p>
  <input type="date" name="birthday"value="<?=$currentStudent->birthday;?>"></input>
  <p>Your photo: </p>
  <input type="file" name="photo">
  <br>
  <button type="submit">Update</button>
  <a link href="#">
    <button>Back</button>
  </a>
</form>

<?php
include "../footer.php";
?>
