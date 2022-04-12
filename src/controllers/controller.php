<?php

class Controller
{
    private $model;

    // @param Model $model
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getAllStudents()
    {
        return $this->model->getStudentsFromDatabase();
    }

    public function create($name, $surname, $birthday, $photo)
    {
        if (isset($_POST)) {
            $this->model->createStudent($name, $surname, $birthday, $photo);
            header("Location: http://localhost/index.php");
        } else {
            require $_SERVER['DOCUMENT_ROOT'] . '/src/views/form.php';
        }
    }
}
