<?php

class Student
{
    private $database;

    // @param $database : Database
    public function __construct($database)
    {
        if ($database == null) {
            throw new \InvalidArgumentException;
            return;
        }

        $this->database = $database;
    }

// TODO: funcs for interactions with database
//
// find, insert, create, update, delete etc
//
}
