<?php
class Model
{
    private $database;

    // @param Database $database
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
        $connection = $this->database->getConnection();

        $query = "SELECT * FROM students ORDER BY id;";
        $students = $this->getQueryResultAsArray($query, $connection, null);

        $this->database->closeConnection();

        return $students;
    }

    // @param string $nameOrSurname
    // @return array
    public function findStudentsByName($nameOrSurname)
    {
        $connection = $this->database->getConnection();
        $query = "SELECT * FROM students WHERE name LIKE '%$nameOrSurname%' OR surname LIKE '$nameOrSurname%';";
        $namedStudents = $this->getQueryResultAsArray($query, $connection, null);
        $this->database->closeConnection();

        return $namedStudents;
    }
    // @param string $name
    // @param string $surname
    // @param date $birthday
    // @param string $photo
    public function createStudent($name, $surname, $birthday, $photo)
    {
        $connection = $this->database->getConnection();
        $query = "INSERT INTO `students` (`name`, `surname`, `birthday`, `photo`) VALUES (?, ?, ?, ?);";
        $this->queryExecute($query, $connection, [$name, $surname, $birthday, $photo]);
        $this->database->closeConnection();
    }

    public function updateStudentById($id, $name, $surname, $birthday, $photo)
    {
        $connection = $this->database->getConnection();
        $query = "UPDATE `students` SET `name` = ?, `surname` = ?, `birthday` = ?, `photo` = ? WHERE `id` = ?";
        $this->queryExecute($query, $connection, [$name, $surname, $birthday, $photo, $id]);
        $this->database->closeConnection();
    }

    public function deleteById($id)
    {
        $connection = $this->database->getConnection();
        $query = "DELETE FROM `students` WHERE `id` = $id";
        $this->queryExecute($query, $connection, null);
        $this->database->closeConnection();
    }

    // @param string $query
    // @param PDO $connection
    private function getQueryResultAsArray($query, $connection, $params)
    {
        $result = array();
        $resultFromConnectionQuery = $this->queryExecute($query, $connection, $params);

        while ($row = $resultFromConnectionQuery->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }

//  @param String $query
//  @param PDO $connection
//  @param nullOrArray $params
//  @throws QueryException
    private function queryExecute($query, $connection, $params)
    {
        $statement = $connection->prepare($query);
        if ($params == null) {
            $statement->execute();
        } else {
            $statement->execute($params);
        }

        return $statement;
    }
}
