<?php 



class Config{


    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "demo";
    private $connection;


    public function connect()
    {
        $this->connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);

    }
    public function __constructor()
    {
        $this->connect();
    }

    public function insert($name,$age,$number,$address)
    {
        $query = "INSERT INTO patients (name,age,number,address) VALUES ('$name',$age,$number,'$address')";
        $res = mysqli_query($this->connection, $query);
        if($res)
        {
            echo "Database connected succesfully";
        }
        else
        {
            echo "Database connection failed!";
        }
    }
}


?>