<?php
/*
*Created by .
*User:Hcer
*Date:2019/11/21
*Time:18:43
*/
$id = $_POST['id'];

include_once 'db.php';

$sql = "DELETE FROM info WHERE id='{$id}'";

$result = $con -> query($sql);

if ($result){
    //删除成功
    $data = array(
        'code' => "1",
        "res" => $result,
        'info' => "删除成功!"
    );
}else{
    //删除失败
    $data = array(
        'code' => "0",
        'info' => "删除失败!{$con -> connect_error}"
    );
}

$con -> close();
echo json_encode($data);