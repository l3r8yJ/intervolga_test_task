<?php $TITLE = 'List of students.'
?>

<?php ob_start()?>
	<br>
    <center><h2>Students</h2></center>
	<br>
	<div class="table-container">
    <table class="fl-table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Birthday</th>
            <th>Photo</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?=$student['id']?></td>
            <td><?=$student['name']?></td>
            <td><?=$student['surname']?></td>
            <td><?=$student['birthday']?></td>
            <td>
                <img class="img-responsive" src="<?=$student['photo']?>">
            </td>
            <td>
                <a link href="/src/views/edit.php?id=<?=$student['id']?>">Edit</a>
            </td>
            <td>
                <a link href="">
                    <img class="icon" src="../images/icons/delete.png">
                </a>
            </td>
        </tr>
        <?php endforeach?>
    </table>
	</div>
    <br>
    <div class="create-container">
        <a href="../src/views/form.php"><button class="style">Add</button></a>
    </div>
    <br>

<?php include 'preload.php'?>