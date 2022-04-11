<?php
class Database
{
    private $userName = 'root', $password = 'root', $host = '127.0.0.1', $port = '8889', $name;

    // @param String $name
    public function __construct($name)
    {
        $this->name = $name;
    }

    // @return PDO
    public function getConnection()
    {
        return new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->name", $this->userName, $this->password);
    }

    // idk what would be better, create a @param PDO $connection
    // or
    // make this method close self connection, - in current version this variant.
    public function closeConnection()
    {
        $this->connection = null;
    }
}
