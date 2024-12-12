<?php

header("Access-Control-Allow-Method:GET");
header("Content-Tyoe:application/json");

include("config.php");

$c1 = new Config();
if ($_SERVER["REQUEST_METHOD"] == "GET") {


    $res = $c1->fetch();
    // $arr = []; for array
    $students = [];//for map
    if ($res) {


        while ($data = mysqli_fetch_assoc($res)) {

            // array_push($arr, $data);..for array
            array_push($students, $data);


            //for map 👇
            $arr['data'] = $students;


        }



    } else {
        $arr['err'] = "Data not found";
    }

} else {
    $arr['err'] = "Only GET type is allowed";
}


echo json_encode($arr);



?>