
<form action="" method="post">
  <p>Name: </p>
  <input type="text" name="name"><?php echo htmlspecialchars($student['name']); ?></input>
  <p>Surname: </p>
  <input type="text" name="surname"><?php echo htmlspecialchars($student['surname']); ?></input>
  <p>Birthday: </p>
  <input type="date" name="birthday" value="<?php echo htmlspecialchars($student['birthday']); ?>"></input>
  <p>Your photo: </p>
  <input type="file" name="photo">
  <br>
  <button type="submit">Create</button>
  <a link href="../../index.php">
    Back
  </a>
</form>