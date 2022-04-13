<?php
if (!isset($_POST['photo'])) {

    $_FILES['photo']['size'] = 0;
    $_FILES['photo']['tmp_name'] = 'none';

} else {

    try {

        $photo = $_FILES['photo']['name'];
        $path = $_SERVER['DOCUMENT_ROOT'] . '/src/uploads/' . $photo;
        $result = move_uploaded_file($photo, $path);
        echo "$photo<br/>";
        echo "$path<br/>";
        echo $result;

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

}
?>


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
