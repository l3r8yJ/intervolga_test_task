<?php
require $_SERVER['DOCUMENT_ROOT'] . '/src/lib/database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/src/models/student_model.php';

class Controller
{
    private $model;

    /**
     * __construct
     *
     * @param StudentModel $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * handle
     *
     * @param string $request
     * @return void
     */
    public function handle($request)
    {
        switch ($request) {
            case 'create':
                $this->create();
                break;
            case 'update':
                $this->update();
                break;
            case 'delete':
                $this->delete();
                break;
            default:
                $this->read();
                break;
        }
    }

    /**
     * create
     *
     * @return void
     */
    private function create()
    {
        $this->model->openConnection();

        if (!isset($_POST['photo'])) {

            $_FILES['photo']['size'] = 0;
            $_FILES['photo']['tmp_name'] = 'none';

        } else {

            try {

                $photo = $_FILES['photo']['name'];
                $path = $_SERVER['DOCUMENT_ROOT'] . '/src/uploads/' . $photo;
                $result = move_uploaded_file($photo, $path);
                echo "$photo<br/>";
                echo "$path<br/>";
                echo $result;

            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        $this->model->closeConnection();
    }

    /**
     * edit
     *
     * @return void
     */
    private function update()
    {
        $this->model->openConnection();

        $id = (int) $_GET['id'];

        $currentStudent = $this->model->readStudentById($id);

        if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['birthday'])) {

            try {
                $name = htmlspecialchars($_POST['name']);
                $surname = htmlspecialchars($_POST['surname']);
                $birthday = htmlspecialchars($_POST['birthday']);
                $this->model->updateStudent($id, ['name' => $name, 'birthday' => $birthday, 'surname' => $surname, 'birthday' => $birthday]);
                $this->model->closeConnection();
                header('Location: /');

            } catch (Exception $e) {
                echo 'Error updating student: ' . $e->getMessage();
            }
        }

        include $_SERVER['DOCUMENT_ROOT'] . '/src/views/edit/form.php';
    }

    /**
     * delete
     *
     * @return void
     */
    private function delete()
    {
        $this->model->openConnection();

        $id = (int) $_GET['id'];

        $this->model->deleteStudent($id);

        $this->model->closeConnection();

        header('Location: /');
    }

    /**
     * read
     *
     * @return void
     */
    private function read()
    {
        $this->model->openConnection();

        if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['birthday']) && isset($_POST['photo'])) {
            try {
                $id = $this->model->createStudent([
                    'name' => htmlspecialchars($_POST['name']),
                    'surname' => htmlspecialchars($_POST['surname']),
                    'birthday' => htmlspecialchars($_POST['birthday']),
                    'photo' => htmlspecialchars($_POST['photo']),
                ]);

                if (!$id) {
                    die('Could not create student');
                }
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }

        $list = $this->model->readAllStudents();

        include $_SERVER['DOCUMENT_ROOT'] . '/src/views/header.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/src/views/create/form.php';

        $this->model->closeConnection();
    }
}
