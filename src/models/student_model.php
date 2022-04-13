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
<<<<<<< HEAD
        if ($database instanceof Database) {
            $this->database = $database;
        } else {
            throw new InvalidArgumentException();
        }
=======
        $this->database->openConnection();

        $students = R::findAll('students');

        $this->database->closeConnection();

        return $students;
>>>>>>> d000df7f32648b950923a14bf360e861dd3475ef
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
        $students = R::findAll('students');
      
        return $students;
    }

    /**
     * readStudentById
     *
     * @param int $id
     * @return array|Object
     */
    public function readStudentById(int $id)
    {
        $student = R::findOne('students', 'id = ?', [$id]);

        return $student;
    }

    /**
     * writeStudent
     *
     * @param array $params [name, surname, birthday, photo]
     * @return void
     */
    public function createStudent(array $params)
    {
        $student = R::dispense('students');
      
        $student = $this->setStudent($student, $params);
      
        R::store($student);
    }

    /**
     * deleteStudent
     *
     * @param int $id
     */
    public function deleteStudent(int $id)
    {
        $student = R::load('students', $id);

        R::trash($student);
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
        $student = R::findOne('students', 'id = ?', [$id]);

        $student->name = $params['name'];
        $student->surname = $params['surname'];
        $student->birthday = $params['birthday'];

        R::store($student);
    }

    /**
     * setStudent
     *
     * @param Object|array $student
     * @param array $params
     * @return void
     */
    private function setStudent($student, array $params)
    {
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
        $student = R::load('students', $id);
      
        $student = $this->setStudent($student, $params);
      
        R::store($student);
    }

    /**
     * deleteStudent
     *
     * @param int $id
     */
    public function deleteStudent(int $id)
    {
        $student = R::load('students', $id);
      
        R::trash($student);
    }
}
