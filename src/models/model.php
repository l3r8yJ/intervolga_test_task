<?php

class Model
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

    // @return array of students
    public function putStudents()
    {
        $connection = $this->database->openConnection();

        $query = "SELECT * FROM students ORDER BY id;";
        $result = $connection->query($query);

        $students = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $students[] = $row;
        }

        $this->database->closeConnection($connection);

        return $students;
    }
// TODO: funcs for interactions with database
//
// find, insert, create, update, delete etc
//
}
