<?php
class Database
{
    private $userName = 'root', $password = 'root', $host = '127.0.0.1', $name = 'test_task', $port = '8889';

    // @return PDO
    // @throws PDOException
    public function getConnection()
    {
        try {
            return new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->name", $this->userName, $this->password);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // idk what would be better, create a @param PDO $connection
    // or
    // make this method close self connection, - in current version this variant.
    public function closeConnection()
    {
        $this->connection = null;
    }
}
