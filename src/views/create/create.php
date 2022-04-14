<?php
include $_SERVER['DOCUMENT_ROOT'] . '/index.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../public/styles/css/form.css">
  <title>Create</title>
</head>
<body>

  <div class="form">
    <div class="title">Hi!</div>

    <div class="subtitle">Let's add some students!</div>



    <form action="" method="post">

        <div class="input-container ic1">
          <input id="name" name=name class="input" type="text" placeholder=" " />
          <div class="cut"></div>
          <label for="name" class="placeholder">First name</label>
        </div>

        <div class="input-container ic2">
          <input id="surname" name="surname" class="input" type="text" placeholder=" " />
          <div class="cut"></div>
          <label for="surname" class="placeholder">Last name</label>
        </div>

      <div class="cut"></div>
      <div class="subtitle">Birthday:</div>
      <input type="date" name="birthday" class="datepicker-input">

      <div class="subtitle">Photo</div>
      <input type="file" name="photo">
      <br>
      <button type="submit" class="submit" >Create</button>
      </a>
    </form>
  </div>
</body>
