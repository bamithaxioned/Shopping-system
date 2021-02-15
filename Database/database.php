<?php

class Database
{

    private $dbHost = "localhost";
    private $dbUsername = "phpmyadmin";
    private $dbPassword = "root";
    private $dbName = "shoppingsystem";

    private $conn = false;
    public $mysqli;

    public function db_connect()
    {
        if (!$this->conn) {
            $this->mysqli = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName); #CREATED CONNECTION
            $this->conn = true;

            if ($this->mysqli->connect_error) {
                return false;
            } else {
                return true;
            }
            
        } else {
            return true;
        }
    }
}

#CREATING OBJECT OF DATABASE.
$dbConn = new Database();
$dbConn->db_connect();