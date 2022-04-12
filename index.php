<?php
require_once './src/database.php';
require_once './src/controllers/controller.php';
require_once './src/models/model.php';

$database = new Database("test_task");
$model = new Model($database);
$controller = new Controller($model);

$action = '';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

echo $action;

switch ($action) {
    case 'create':
        if (isset($_POST['create'])) {
            if (isset($_POST['name']) && $_POST['surname'] && $_POST['birthday']) {
                $params = prepareParams();
                // TODO: check last added index, if null send message and exit
                $controller->create($params['name'], $params['surname'], $params['birthday'], $params['photo']);
                header("Location: index.php");
                require_once $_SERVER['DOCUMENT_ROOT'] . '/src/views/form.php';
                break;
            }

        }
        break;

    case 'edit':
        $id = $_GET['id'];
        $student = $this->controller->getById($id);
        require_once $_SERVER['DOCUMENT_ROOT'] . '/src/views/edit.php';
        break;

    default:
        $students = $controller->getAllStudents();
        require_once $_SERVER['DOCUMENT_ROOT'] . "/src/views/default.php";
        break;
}

function prepareParams()
{
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthday = date("Y-m-d", strtotime(($_POST['birthday'])));
    $photo = $_POST['photo'];

    return [$name, $surname, $birthday, $photo];
}
