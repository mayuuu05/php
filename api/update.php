<?php

header("Access-Control-Allow-Method:PUT");
header("Content-Tyoe:application/json");

include("config.php");

$c1 = new Config();
if ($_SERVER["REQUEST_METHOD"] == "PUT") {

    $data = file_get_contents("php://input");


    parse_str($data, $result);
    $id = $result["id"];
    $name = $result["name"];
    $age = $result["age"];
    $phone = $result["phone"];
    $course = $result["course"];


    $res = $c1->update($id, $name, $age, $phone, $course);

    if ($res) {

        $arr['msg'] = "Data updated successfully !";

    } else {

        $arr["msg"] = "Data not updated  !";
    }

} else {
    $arr['err'] = "Only  type UPDATE is allowed";
}


echo json_encode($arr);



?>