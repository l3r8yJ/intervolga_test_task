<?php
require '../lib/rb.php';

class Database
{
    private $userName = 'root', $password = 'root', $host = '127.0.0.1', $port = '8889', $name;

    public function openConnection()
    {
        R::setup("mysql:host=$this->host;port=$this->port;dbname=$this->name", $this->userName, $this->password);
    }

    public function closeConnection()
    {
        R::close();
    }
}