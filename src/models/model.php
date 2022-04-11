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
        $students = $this->getQueryResultAsArray($query, $connection);

        $this->database->closeConnection();

        return $students;
    }

    // @param string $nameOrSurname
    public function findStudentsByName($nameOrSurname)
    {
        $connection = $this->database->getConnection();
        $query = "SELECT * FROM students WHERE name LIKE '%$nameOrSurname%' OR surname LIKE '$nameOrSurname%';";
        $namedStudents = $this->getQueryResultAsArray($query, $connection);
        $this->database->closeConnection();

        return $namedStudents;
    }

    public function createStudent($name, $surname, $birthday, $photo)
    {
        $connection = $this->database->getConnection();
        $query = "INSERT INTO `students` (`name`, `surname`, `birthday`, `photo`) VALUES (?, ?, ?, ?);";
        $statement = $connection->prepare($query);
        $statement->execute([$name, $surname, $birthday, $photo]);

        $this->database->closeConnection();
    }

// TODO: funcs for interactions with database
//
// //find// , update, create, update, delete etc
//

    // @param string $query
    // @param PDO $connection
    private function getQueryResultAsArray($query, $connection)
    {
        $result = array();
        $resultFromConnectionQuery = $this->queryExecute($query, $connection);

        while ($row = $resultFromConnectionQuery->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }

//  @param String $query
//  @param PDO $connection
//  @param nullOrArray $params
//  @throws QueryException
    private function queryExecute($query, $connection)
    {
        $statement = $connection->prepare($query);
        $statement->execute();

        return $statement;
    }
}
