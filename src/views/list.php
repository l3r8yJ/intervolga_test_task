<h2>Students</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Birthday</th>
            <th>Photo</th>
        </tr>
        
        <?php foreach ($list as $student): ?>
            <tr>
                <th><?=htmlspecialchars($student['id']);?></th>
                <th><?=htmlspecialchars($student['name']);?></th>
                <th><?=htmlspecialchars($student['surname']);?></th>
                <th><?=htmlspecialchars($student['birthday']);?></th>
                <th><img src="<?=$_SERVER['HTTP_REQUEST'] . '/uploads/' . htmlspecialchars($student['photo'])?>" style="width: 20%" alt=""></th>

                <th style="width: 5%;">
                    <a href="<?=$_SERVER['HTTP_REQUEST'] . '/src/views/'?>add/add_photo.php?id=<?=$student['id']?>">
                        Add photo
                    </a>
                </th>

                <th style="width: 5%;">
                    <a href="<?=$_SERVER['HTTP_REQUEST'] . '/src/views/'?>edit/edit.php?id=<?=$student['id']?>">
                        <img src="<?=$_SERVER['HTTP_REQUEST']?>/public/images/edit.png" alt="" style="width: 30%;">
                    </a>
                </th>

                <th style="width: 5%;">
                    <a href="<?=$_SERVER['HTTP_REQUEST'] . '/src/views/'?>delete/delete.php?id=<?=$student['id']?>">
                        <img src="<?=$_SERVER['HTTP_REQUEST']?>/public/images/delete.png" alt="" style="width: 30%;">
                    </a>
                </th>
            </tr>
        <?php endforeach;?>
        
        <th width="200">
            <a href="<?=$_SERVER['HTTP_REQUEST']?>/src/views/create/create.php">
                <button>Add new</button>
            </a>
        </th>
    
    </table>
</div>
<?php
?>
