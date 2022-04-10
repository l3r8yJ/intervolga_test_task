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

    public function findStudentsByName($name)
    {
        $connection = $this->database->getConnection();
        $query = 'SELECT * FROM students WHERE name = :name;';

        $params = [
            'name' => $name,
        ];

        $namedStudents = $this->getQueryResultAsArray($query, $connection, $params);
        $this->database->closeConnection();

        return $namedStudents;
    }
// TODO: funcs for interactions with database
//
// find, insert, create, update, delete etc
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
    private function queryExecute($query, $connection, $params = array())
    {
        $statement = $connection->prepare($query);

        if ($params == null) {
            $statement->execute();
        } else {
            $statement->execute(array_keys($params));
        }

        return $statement;
    }
}
