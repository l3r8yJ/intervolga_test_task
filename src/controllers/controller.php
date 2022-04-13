<?php

class Controller
{
    private $model;

    // @param Model $model
    public function __construct($model)
    {
        $this->model = $model;
    }
}
