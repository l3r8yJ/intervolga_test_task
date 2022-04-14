<?php

require '../../models/student_model.php';
require '../../lib/database.php';

$model = new StudentModel(new Database('test_task'));
$model->openConnection();

$id = (int) $_GET['id'];

$currentStudent = $model->readStudentById($id);

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['birthday'])) {

    try {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $birthday = $_POST['birthday'];
        $model->updateStudent($id, ['name' => $name, 'birthday' => $birthday, 'surname' => $surname, 'birthday' => $birthday]);
        $model->closeConnection();
        header('Location: /');

    } catch (Exception $e) {
        echo 'Error updating student: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../public/styles/css/form.css">
  <title>Edit</title>
</head>
<body>

<div class="form">

  <div class="title">Hi!</div>
  <div class="subtitle">Let's add some students!</div>

  <form action="" method="post">

      <div class="input-container ic1">
        <input id="name" name=name class="input" type="text" placeholder=" " value="<?=htmlspecialchars($currentStudent->name);?>"/>
        <div class="cut"></div>
        <label for="name" class="placeholder">First name</label>
      </div>

      <div class="input-container ic2">
        <input id="surname" name="surname" class="input" type="text" placeholder=" " value="<?=htmlspecialchars($currentStudent->surname);?>" />
        <div class="cut"></div>
        <label for="surname" class="placeholder">Last name</label>
      </div>

    <div class="cut"></div>
    <div class="subtitle">Birthday:</div>
    <input type="date" name="birthday" class="datepicker-input" value="<?=htmlspecialchars($currentStudent->birthday);?>">

    <div class="subtitle">Photo</div>
    <input type="file" name="photo">
    <br>
    <button type="submit" class="submit" >Done</button>

  </form>
</div>

</body>
</html>
