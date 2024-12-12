<?php

header("Access-Control-Allow-Method:POST");
header("Content-Tyoe:application/json");

include("config.php");

$c1 = new Config();


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $name = $_POST["name"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];
    $course = $_POST["course"];


    $res = $c1->insert($name, $age, $phone, $course);

    if ($res) {
        $arr['msg'] = "Data inserted successfully!";

    } else {
        $arr["msg"] = "Data not inserted!";
    }

} else {
    $arr['error'] = "Only POST type is allowed!";
}


echo json_encode($arr);



?>