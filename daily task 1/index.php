<?php
include("config.php");

session_start();

$c1 = new Config();


// $c1->connect();

$is_btn_set = isset($_POST['button']);
if ($is_btn_set) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $number = $_POST['number'];
    $address = $_POST['address'];

    $c1->insert($name, $age, $number, $address);
    header("Location:index.php");
}




if (isset($_POST['delete'])) {
    $id = $_POST['deleteId'];
    $c1->delete($id);
    header("Location:index.php");

}

if (isset($_POST['update'])) {
    $id = $_POST['deleteId'];
    $name = $_POST['nameId'];
    $age = $_POST['ageId'];
    $number = $_POST['numberId'];
    $address = $_POST['addressId'];

    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    $_SESSION['age'] = $age;
    $_SESSION['number'] = $number;
    $_SESSION['address'] = $address;

    header("Location:update.php");

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
                        <h3>Hospital Registration Form</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your name" required>
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" name="age"
                                    placeholder="Enter your age" required>
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="number" name="number"
                                    placeholder="Enter your phone number" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3"
                                    placeholder="Enter your address" required></textarea>
                            </div>
                            <div class="text-center">
                                <button name="button" type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="mx-auto p-2" style="width: 900px;">


        <div class="card shadow">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Patient's Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php while ($data = mysqli_fetch_assoc($res)) { ?>
                    <tr>
                        <th scope="row"><?php echo $data['id'] ?></th>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo $data['age'] ?></td>
                        <td><?php echo $data['number'] ?></td>
                        <td><?php echo $data['address'] ?></td>
                        <td>

                            <form method="POST">
                                <input type="hidden" value="<?php echo $data['id'] ?>" name="deleteId">
                                <input type="hidden" value="<?php echo $data['name'] ?>" name="nameId">
                                <input type="hidden" value="<?php echo $data['age'] ?>" name="ageId">
                                <input type="hidden" value="<?php echo $data['number'] ?>" name="numberId">
                                <input type="hidden" value="<?php echo $data['address'] ?>" name="addressId">

                                <button type="submit" class="btn btn-warning" name="update">Update</button>
                                <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6j