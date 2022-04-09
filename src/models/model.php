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
    public function getStudentsFromDatabase()
    {
        $students = array();
        $connection = $this->database->openConnection();
        $query = "SELECT * FROM students ORDER BY id;";
        $result = $this->queryExecute($query, $connection);

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

//  @param String $query
//  @param PDO $connection
//  @return mixed
    private function queryExecute($query, $connection)
    {
        try {
            return $connection->query($query);
        } catch (Exception $e) {
            die("An error in the query:\n" . $e->getMessage());
        }
    }
}
