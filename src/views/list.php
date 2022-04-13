<table class="fl-table">
    <tr>
    <th>id</th>
    <th>Name</th>
    <th>Surname</th>
    <th>Birthday</th>
    </tr>

    <?php foreach ($list as $student): ?>
    <tr>
    <th><?=$student['id']?></th>
    <th><?=$student['name']?></th>
    <th><?=$student['surname']?></th>
    <th><?=$student['birthday']?></th>
    <th><a href="<?=$_SERVER['HTTP_REQUEST'] . '/src/views/'?>edit/form.php?id=<?=$student['id']?>">Edit</a></th>
    <th><a href="<?=$_SERVER['HTTP_REQUEST'] . '/src/views/'?>delete/delete.php?id=<?=$student['id']?>">Delete</a></th>
    </tr>
    <?php endforeach;?>

</table>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/src/views/footer.php';
?>
