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
     * handle main "process"
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
            case 'add_photo':
                $this->addPhoto();
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

        if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['birthday'])) {

            try {

                $this->postValidate();

                $this->model->createStudent([
                    'name' => $_POST['name'],
                    'surname' => $_POST['surname'],
                    'birthday' => $_POST['birthday'],
                ]);

                $this->model->closeConnection();

                header('Location: /');

            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    }

    /**
     * edit
     *
     * @return void
     */
    private function edit()
    {
        $this->model->openConnection();

        $id = $_GET['id'];

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
     * addPhoto
     *
     * @return void
     */
    private function addPhoto()
    {
        $this->model->openConnection();

        $id = $_GET['id'];

        if (isset($_POST['submit'])) {

            try {

                $this->imageValidate();

                $this->linkPhotoAndStudent($id);

                $this->model->closeConnection();

                header('Location: / ');

            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }

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
        if (!$this->validateField($_POST['name'], 'name') || !$this->validateField($_POST['surname'], 'name')) {
            throw new \InvalidArgumentException('fields are not valid');
        }
    }

    /**
     * imageValidate
     *
     * @return void
     */
    private function imageValidate()
    {
        $mimetype = mime_content_type($_FILES['photo']['tmp_name']);

        if (!in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png'))) {
            throw new \InvalidArgumentException('File are not image.');
        }
    }

    /**
     * linkPhotoAndUser
     *
     * @param integer $id
     * @throws InvalidArgumentException
     * @return void
     */
    private function linkPhotoAndStudent(int $id)
    {
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";

        $fileName = $_FILES['photo']['name'];

        $ext = pathinfo($fileName, PATHINFO_EXTENSION);

        $newFileName = md5($id) . '.' . $ext;

        if (file_exists($targetDir . $newFileName)) {
            unlink($targetDir . $newFileName);
        }

        $fileTemp = $_FILES['photo']['tmp_name'];

        if (!move_uploaded_file($fileTemp, $targetDir . $newFileName)) {
            echo "File not loaded.";
        }

        $this->model->addImageToStudent($id, $newFileName);
    }
}
