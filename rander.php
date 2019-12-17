<?php
/*
*Created by .
*User:Hcer
*Date:2019/11/21
*Time:14:45
*/
include_once 'db.php';


$sql = 'select * from info';


$result = $con -> query($sql);
$data = array();
if ($result -> num_rows > 0){

    while ($arr = $result ->fetch_assoc()){
        array_push($data,$arr);
    }
    $data = array(
        "code" => "1",
        "info" => $data
    );
}else{
    $data = array(
        "code" => "-1",
        "info" => "查询失败，错误原因:{$con -> connect_error}"
    );
}

$con -> close();

echo json_encode($data);

