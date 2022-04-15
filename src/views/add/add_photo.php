<?php
include $_SERVER['DOCUMENT_ROOT'] . '/index.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?=$_SERVER['HTTP_REQUEST']?>/public/styles/css/photo_form.css">
  <title>Add photo</title>
</head>
<body>

  <form method="post" enctype="multipart/form-data">
    <div class="wrapper">
      <div class="file-upload">
        <input type="file" name="photo" id="photo">
        <i class="fa fa-arrow-up"></i>
      </div>
    </div>
    <input type="submit" class="submit" value="Upload Image" name="submit">
  </form>

</body>
</html>
