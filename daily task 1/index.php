<?php 

  include("config.php");

  $c1 = new Config();
  $c1->connect();
    

 
  $is_btn_set=isset($_POST['button']);
  if($is_btn_set)
  {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $number = $_POST['number'];
    $address = $_POST['address'];



    $c1->insert($name, $age, $number, $address);

  }    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Form</title>
</head>
<body>

    <center>
    <h1> Hospital Registration Form</h1>
    <form method = "POST">
        <input placeholder ="Name" name="name"><br><br>
        <input placeholder ="Age" name="age"><br><br>
        <input placeholder ="Phone number" name="number"><br><br>
        <input placeholder ="Address" name="address"><br><br>
        <button name= "button" type="submit">Submit</button>

</form>

</center>
    
</body>
</html>