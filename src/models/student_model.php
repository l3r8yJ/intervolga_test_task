<?php
class StudentModel
{
    private $database;

    /**
     * __construct
     *
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    /**
     * openConnection
     *
     * @return void
     */
    public function openConnection()
    {
        $this->database->openConnection();
    }

    /**
     * closeConnection
     *
     * @return void
     */
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
     * @return int
     */
    public function createStudent(array $params)
    {
        $student = R::dispense('students');
        $student = $this->setStudent($student, $params);
        $id = R::store($student);

        return $id;
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
 * addImageToStudent
 *
 * @param int $id
 * @param string $photo filename
 * @return void
 */
    public function addImageToStudent(int $id, string $photo)
    {
        $student = R::findOne('students', 'id = ?', [$id]);

        $student->photo = $photo;

        R::store($student);
    }

    /**
     * setStudent
     *
     * @param Object|array $student
     * @param array $params
     * @return mixed
     */
    private function setStudent($student, array $params)
    {
        $student->name = $params['name'];
        $student->surname = $params['surname'];
        $student->birthday = $params['birthday'];

        return $student;
    }
}
