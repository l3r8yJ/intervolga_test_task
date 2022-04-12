<?php $TITLE = 'List of students.'
?>

<?php ob_start()?>
	<br>
    <center><h1>Students</h1></center>
	<br>
	<div class="table-responsive">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Birthday</th>
            <th>Photo</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($studs as $stud): ?>
        <tr>
            <td><?=$stud['id']?></td>
            <td><?=$stud['name']?></td>
            <td><?=$stud['surname']?></td>
            <td><?=$stud['date']?></td>
            <td><?=$stud['photo']?></td>
        </tr>
        <?php endforeach?>
    </table>
	</div>
    <br>
<?php $root = ob_get_clean()?>

<?php include 'view/preload.php'?>