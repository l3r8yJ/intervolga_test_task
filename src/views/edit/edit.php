<?php
include $_SERVER['DOCUMENT_ROOT'] . '/index.php';
$currentStudent = $_SESSION['currentStudent'];
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

    <button type="submit" class="submit" >Save</button>

  </form>
</div>

</body>
</html>
