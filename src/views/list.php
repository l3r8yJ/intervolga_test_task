<h2>Students</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <tr>
        <th>id</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Birthday</th>
        </tr>

        <?php foreach ($list as $student): ?>
        <tr>
        <th><?=htmlspecialchars($student['id']);?></th>
        <th><?=htmlspecialchars($student['name']);?></th>
        <th><?=htmlspecialchars($student['surname']);?></th>
        <th><?=htmlspecialchars($student['birthday']);?></th>

        <th style="width: 10%;">
            <a href="<?=$_SERVER['HTTP_REQUEST'] . '/src/views/'?>edit/form.php?id=<?=$student['id']?>">
                <img src="<?=$_SERVER['HTTP_REQUEST']?>/public/images/edit.png" alt="" style="width: 30%;">
            </a>
        </th>

        <th style="width: 10%;">
            <a href="<?=$_SERVER['HTTP_REQUEST'] . '/src/views/'?>delete/delete.php?id=<?=$student['id']?>">
                <img src="<?=$_SERVER['HTTP_REQUEST']?>/public/images/delete.png" alt="" style="width: 30%;">
            </a>
        </th>
        </tr>
        <?php endforeach;?>

    </table>
</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/src/views/footer.php';
?>