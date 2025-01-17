<?php

header("Access-Control-Allow-Method:DELETE");
header("Content-Tyoe:application/json");

include("config.php");

$c1 = new Config();
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {

    $data = file_get_contents("php://input");
    parse_str($data, $result);
    $id = $result["id"];
    $res = $c1->delete($id);

    if ($res) {

        $arr['msg'] = "Data deleted successfully !";

    } else {

        $arr["msg"] = "Data not deleted  !";
    }

} else {
    $arr['err'] = "Only DELETE type is allowed";
}


echo json_encode($arr);



?>