<?php
include("config.php");
session_start();

$c1 = new Config();



$id = $_SESSION["id"];
$name = $_SESSION["name"];
$age = $_SESSION["age"];
$number = $_SESSION["number"];
$address = $_SESSION["address"];



if (isset($_POST["button"])) {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $number = $_POST["number"];
    $address = $_POST["address"];

    $c1->update($id, $name, $age, $number, $address);
    header("Location:index.php");

}
$res = $c1->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center bg-primary text-white">
                        <h3>Update Registration Form</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="<?php echo $name ?>" placeholder="Enter your name" required>
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" name="age" value="<?php echo $age ?>"
                                    placeholder="Enter your age" required>
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="number" name="number"
                                    value="<?php echo $number ?>" placeholder="Enter your phone number" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input class="form-control" id="address" name="address" value="<?php echo $address ?>"
                                    placeholder="Enter your address" required></input>
                            </div>
                            <div class="text-center">
                                <button name="button" type="submit" class="btn btn-primary w-100">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6j