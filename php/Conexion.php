<?php

class Conexion
{
    public mysqli $conn;

    function __construct($host = 'bzh9gtorxmjioxfbeldd-mysql.services.clever-cloud.com', $user = 'udbev7laqkszw31i', $pass = 'GAHoPrxA8nJVQZZs7uLw', $db = 'bzh9gtorxmjioxfbeldd')
    {
        $this->conn= new mysqli($host, $user, $pass, $db);
    }
}