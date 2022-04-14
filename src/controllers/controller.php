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
            case 'edit':
                $this->edit();
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

        if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['birthday']) && isset($_POST['photo'])) {

            try {

                $this->postValidate();

                $id = $this->model->createStudent([
                    'name' => $_POST['name'],
                    'surname' => $_POST['surname'],
                    'birthday' => $_POST['birthday'],
                    'photo' => $_POST['photo'],
                ]);

                if (!$id) {
                    die('Could not create student');
                }

                header('Location: /');

            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }

        $this->model->closeConnection();
    }

    /**
     * edit
     *
     * @return void
     */
    private function edit()
    {
        $this->model->openConnection();

        $id = (int) $_GET['id'];
        $currentStudent = $this->model->readStudentById($id);
        $_SESSION['currentStudent'] = $currentStudent;

        if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['birthday'])) {

            try {

                $this->postValidate();

                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $birthday = $_POST['birthday'];
                $this->model->updateStudent($id, ['name' => $name, 'birthday' => $birthday, 'surname' => $surname, 'birthday' => $birthday]);
                $this->model->closeConnection();

                header('Location: /');

            } catch (Exception $e) {
                echo 'Error updating student: ' . $e->getMessage();
            }
        }
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

        $list = $this->model->readAllStudents();

        include $_SERVER['DOCUMENT_ROOT'] . '/src/views/header.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/src/views/list.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/src/views/footer.php';

        $this->model->closeConnection();
    }

    /**
     * validateField
     *
     * @param string $field
     * @param string $type
     * @return boolean
     */
    private function validateField(string $field, string $type)
    {
        $isName = false;
        $isFilename = false;

        // filename validating
        if (preg_match("/^[\w,\s-]+\.[A-Za-z]{3}$/", $field)) {
            $isFilename = true;

            // name/surname validating
        } else if (preg_match("/^([a-zA-Z' ]+)$/", $field)) {
            $isName = true;
        }

        if ($isName && $type == 'name') {
            return true;
        }

        if ($isFilename && $type == 'fileName') {
            return true;
        }

        return false;
    }

    /**
     * postValidate validate name, surname and filename from $_POST
     *
     * @throws InvalidArgumentException
     *
     * @return void
     */
    private function postValidate()
    {
        if (!$this->validateField($_POST['name'], 'name') || !$this->validateField($_POST['surname'], 'name') || !$this->validateField($_POST['photo'], 'fileName')) {
            throw new \InvalidArgumentException('fields are not valid');
        }
    }
}
