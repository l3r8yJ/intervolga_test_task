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
            <th>
                <form name="search" method="get" action="index.php">
                    <input type="text" placeholder="Type name or surname." name="nameOrSurname">
                    <input type="submit" value="Search">
                </form>
            </th>
        </tr>
        <?php foreach ($studs as $stud): ?>
        <tr>
            <td><?=$stud['id']?></td>
            <td><?=$stud['name']?></td>
            <td><?=$stud['surname']?></td>
            <td><?=$stud['birthday']?></td>
            <td><img class="img-responsive" src="<?=$stud['photo']?>"></td>
            <td><a link href="">Edit</a></td>
            <td><a link href="">Delete</a></td>
        </tr>
        <?php endforeach?>
    </table>
	</div>
    <br>
<?php $root = ob_get_clean()?>

<?php include 'preload.php'?>