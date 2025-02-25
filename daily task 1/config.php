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

    public function insert($name, $age, $number, $address)
    {
        $query = "INSERT INTO patients (name, age, number, address) VALUES ('$name', $age, $number, '$address')";
        $res = mysqli_query($this->connection, $query);
        if ($res) {
            echo "Record inserted successfully.";
        } else {
            echo "Insertion failed: " . mysqli_error($this->connection);
        }
    }

    public function fetch()
    {
        $query = "SELECT * FROM patients";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

    public function delete($id)
    {
        $query = "DELETE FROM patients WHERE id = $id";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

    public function update($id, $name, $age, $number, $address)
    {

        $query = "UPDATE patients SET name='$name', age=$age, number=$number, address='$address' WHERE  id=$id";
        $res = mysqli_query($this->connection, $query);
        return $res;


    }
}