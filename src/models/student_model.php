<?php

require $_SERVER['DOCUMENT_ROOT'] . '/src/lib/database.php';
class StudentModel extends Database
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    /**
     * readAllStudents
     *
     * @return array
     */
    public function readAllStudents(): array
    {
        $this->database->openConnection();

        $students = R::findAll('students');

        $this->database->closeConnection();

        return $students;
    }

    /**
     * writeStudent
     *
     * @param array $params
     * @return int $id last inserted id
     */
    public function createStudent(array $params): int
    {
        $this->database->openConnection();

        $student = R::dispense('students');
        $this->setStudent($student, $params);
        $id = R::store($student);

        $this->database->closeConnection();

        return $id;
    }

    /**
     * readStudentById
     *
     * @param int $id
     * @return array
     */
    public function readStudentById(int $id)
    {
        $this->database->openConnection();

        $student = R::findOne('students', 'id = :id', [':id' => $id]);

        $this->database->closeConnection();

        return $student;
    }

    /**
     * rewriteStudent
     *
     * @param int $id
     * @param array $params
     * @return void
     */
    public function updateStudent(int $id, array $params)
    {
        $this->database->openConnection();

        $student = R::load('students', $id);
        $student = $this->setStudent($student, $params);
        R::store($student);

        $this->database->closeConnection();
    }

    /**
     * deleteStudent
     *
     * @param int $id
     */
    public function deleteStudent(int $id)
    {
        $this->database->openConnection();

        $student = R::load('students', $id);
        R::trash($student);

        $this->database->closeConnection();
    }

    /**
     * setStudent
     *
     * @param entity $student current student
     * @param array $params new params [:name, :surname,: birthday, :photo]
     * @return entity
     */
    private function setStudent($student, array $params)
    {
        $student->name = $params['name'];
        $student->surname = $params['surname'];
        $student->birthday = $params['birthday'];
        $student->photo = $params['photo'];

        return $student;
    }
}
