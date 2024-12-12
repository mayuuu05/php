<?php

class Config
{




    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "demo";
    private $connection;

    public function connect()
    {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$this->connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }
    }

    public function __construct()
    {
        $this->connect();
    }

    public function insert($name, $age, $phone, $course)
    {
        $query = "INSERT INTO students (name, age, phone, course) VALUES ('$name', $age, $phone, '$course')";
        $res = mysqli_query($this->connection, $query);
        return $res;

    }

    public function fetch()
    {
        $query = "SELECT * FROM students";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }


}


?>