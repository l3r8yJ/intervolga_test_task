<?php

require $_SERVER['DOCUMENT_ROOT'] . '/src/lib/database.php';
class StudentModel extends Database
{
    /**
     * readAllStudents
     *
     * @return array
     */
    public function readAllStudents()
    {
        $this->openConnection();

        $students = R::findAll('students');

        $this->closeConnection();

        return $students;
    }

    /**
     * writeStudent
     *
     * @param entity $newStudent
     * @return int $id last inserted id
     */
    public function createStudent($params)
    {
        $this->openConnection();

        $student = R::dispense('students');
        $this->setStudent($student, $params);
        $id = R::store($student);

        $this->closeConnection();

        return $id;
    }

    /**
     * readStudentById
     *
     * @param int $id
     * @return array/entity
     */
    public function readStudentById($id)
    {
        $this->openConnection();

        $student = R::findOne('students', 'id = :id', [':id' => (int) $id]);

        $this->closeConnection();

        return $student;
    }

    /**
     * rewriteStudent
     *
     * @param int $id
     * @param entity $newStudent
     * @return void
     */
    public function updateStudent($id, $newStudent)
    {
        $this->openConnection();

        $student = R::load('students', (int) $id);
        $student = $newStudent;
        R::store($student);

        $this->closeConnection();
    }

    public function deleteStudent($id)
    {
        $this->openConnection();

        $student = R::load('students', (int) $id);
        R::trash($student);

        $this->closeConnection();
    }

    /**
     * setStudent
     *
     * @param entity $student current student
     * @param array $params new params [:name, :surname,: birthday, :photo]
     * @return void
     */
    private function setStudent($student, $params)
    {
        $student->name = $params['name'];
        $student->surname = $params['surname'];
        $student->birthday = $params['birthday'];
        $student->photo = $params['photo'];
    }
}
