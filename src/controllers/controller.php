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

    // @param string $name
    public function search($name)
    {
        if ($name) {
            return $this->model->findByName($name);
        }
    }
}
