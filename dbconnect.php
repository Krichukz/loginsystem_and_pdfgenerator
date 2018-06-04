<?php

class DB
{
    public $connection;

    function __construct()
    {
        $this->connection = new mysqli('localhost', 'root', '', 'sistema');

        if ($this->connection->connect_errno) {
            echo "Kļūda savienojumā" . $this->connection->connect_error;
            exit();
        }

    }

}
