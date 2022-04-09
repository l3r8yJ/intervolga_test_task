<?php
class Database
{
    private $userName = 'root', $password = 'root', $host = '127.0.0.1', $name = 'test_task', $port = '8889';

    // @return PDO
    // @throws PDOException
    public function openConnection()
    {
        try {
            return new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->name", $this->userName, $this->password);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    // @param PDO $connection
    public function closeConnection($connection)
    {
        $connection = null;
    }
}
