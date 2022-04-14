<?php

require $_SERVER['DOCUMENT_ROOT'] . '/src/controllers/controller.php';

$controller = new Controller(
    new StudentModel(
        new Database('test_task', 'root', 'root', '127.0.0.1', '8889')
    )
);

$request = str_replace('.php', '', basename($_SERVER['PHP_SELF']));
$request = trim($request, '/');

$controller->handle($request);
