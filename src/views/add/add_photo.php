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
  <title>Add photo</title>
</head>
<body>

  <form method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="photo" id="photo">
    <input type="submit" value="Upload Image" name="submit">
  </form>

</body>
</html>
