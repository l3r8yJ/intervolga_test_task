<?php

require $_SERVER['DOCUMENT_ROOT'] . '/src/controllers/controller.php';

$controller = new Controller(
    new StudentModel(
        new Database('test_task')
    )
);

$request = str_replace('.php', '', basename($_SERVER['PHP_SELF']));
$request = trim($request, '/');

$controller->handle($request);
