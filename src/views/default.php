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
            <td><img class="img-responsive" src="<?=$student['photo']?>"></td>
            <td><a link href="">Edit</a></td>
            <td><a link href="">Delete</a></td>
        </tr>
        <?php endforeach?>
    </table>
	</div>
    <br>
    <div class="create-container">
        <a href="#"><button class="style">Create</button></a>
    </div>
    <br>
<?php $root = ob_get_clean()?>

<?php include 'preload.php'?>