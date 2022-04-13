<?php

class StudentModel
{
    private $database;

    /**
     * __construct
     *
     * @param Database $database
     */
    public function __construct($database)
    {
        if ($database instanceof Database) {
            $this->database = $database;
        } else {
            throw new \InvalidArgumentException();
        }
    }

    /**
     * readAllStudents
     *
     * @return array
     */
    public function readAllStudents()
    {
        $this->database->openConnection();

        return R::findAll('students');

        $this->database->closeConnection();
    }

    public function writeStudent($params)
    {
        $this->database->openConnection();
        $student = R::dispense('students');

        $student->name = $params['name'];
        $student->surname = $params['surname'];
        $student->birthday = $params['birthday'];
        $student->photo = $params['photo'];

        R::store($student);
        $this->database->closeConnection();
    }
}
