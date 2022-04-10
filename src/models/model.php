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

    public function FindStudentsByName($name)
    {
        $connection = $this->database->getConnection();
        $query = "SELECT * FROM students WHERE name = '$name';";

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

        $this->database->closeConnection();

        return $result;
    }

//  @param String $query
//  @param PDO $connection
//  @return mixed
//  @throws QueryException
    private function queryExecute($query, $connection, $params = array() || null)
    {
        try {
            $statement = $connection->prepare($query);

            if ($params == null) {
                $statement->execute();
            }

            return $statement;
        } catch (Exception $e) {
            die("An error in the query:\n" . $e->getMessage());
        }
    }
}
