<?php

header("Content-Type: application/json");
include("config.php");

$c1 = new Config();

$method = $_SERVER["REQUEST_METHOD"];
$arr = [];

switch ($method) {
    case "POST":
        $name = $_POST["name"] ?? null;
        $age = $_POST["age"] ?? null;
        $phone = $_POST["phone"] ?? null;
        $course = $_POST["course"] ?? null;

        if ($name && $age && $phone && $course) {
            $res = $c1->insert($name, $age, $phone, $course);
            $arr['msg'] = $res ? "Data inserted successfully!" : "Data not inserted!";
        } else {
            $arr['error'] = "Missing required parameters!";
        }
        break;

    case "GET":
        $res = $c1->fetch();
        $students = [];
        if ($res) {
            while ($data = mysqli_fetch_assoc($res)) {
                array_push($students, $data);
            }
            $arr['data'] = $students;
        } else {
            $arr['error'] = "No data found!";
        }
        break;

    case "PUT":
        $data = file_get_contents("php://input");
        parse_str($data, $result);

        $id = $result["id"] ?? null;
        $name = $result["name"] ?? null;
        $age = $result["age"] ?? null;
        $phone = $result["phone"] ?? null;
        $course = $result["course"] ?? null;

        if ($id && $name && $age && $phone && $course) {
            $res = $c1->update($id, $name, $age, $phone, $course);
            $arr['msg'] = $res ? "Data updated successfully!" : "Data not updated!";
        } else {
            $arr['error'] = "Missing required parameters!";
        }
        break;

    case "DELETE":
        $data = file_get_contents("php://input");
        parse_str($data, $result);

        $id = $result["id"] ?? null;
        if ($id) {
            $res = $c1->delete($id);
            $arr['msg'] = $res ? "Data deleted successfully!" : "Data not deleted!";
        } else {
            $arr['error'] = "Missing required parameter: id!";
        }
        break;

    default:
        $arr['error'] = "Unsupported request method!";
}

echo json_encode($arr);