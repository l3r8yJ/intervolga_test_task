<?php

class Database
{
    private $userName = 'root', $password = 'root', $host = 'localhost', $name = 'root';

    public function openConnection()
    {
        return new PDO("mysql:host=$this->host;dbname=$this->name", $this->userName, $this->password);
    }

    // @param $connection : PDO
    public function closeConnection($connection)
    {
        $connection = null;
    }
}
