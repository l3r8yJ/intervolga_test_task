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

    public function openConnection()
    {
        $this->database->openConnection();
    }

    public function closeConnection()
    {
        $this->database->closeConnection();
    }

    /**
     * readAllStudents
     *
     * @return array
     */
    public function readAllStudents()
    {
        $students = R::findAll('students');
        return $students;
    }

    /**
     * writeStudent
     *
     * @param array $params [name, surname, birthday, photo]
     * @return void
     */
    public function createStudent($params)
    {
        $student = R::dispense('students');
        $student = $this->setStudent($student, $params);
        R::store($student);
    }

    private function setStudent($student, $params)
    {
        $student->name = $params['name'];
        $student->surname = $params['surname'];
        $student->birthday = $params['birthday'];
        $student->photo = $params['photo'];

        return $student;
    }
}
