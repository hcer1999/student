<?php
/*
*Created by .
*User:Hcer
*Date:2019/11/21
*Time:23:17
*/
include_once 'db.php';
$ID = $_POST['id'];
$Name = $_POST['name'];
$Num = $_POST['num'];
$Sex = $_POST['sex'];
$Major = $_POST['major'];

$sql = "UPDATE info
        SET name = '{$Name}',
            num = '{$Num}',
            sex = '{$Sex}',
            major = '{$Major}'
        WHERE id={$ID}";

$result = $con -> query($sql);

if ($result){
    //修改成功
    $data = array(
        "code" => '1',
        "info" => "修改成功！"
    );
}else{
    //修改失败
    $data = array(
        "code" => '0',
        "info" => "修改失败！{$con -> connect_error}"
    );
}

$con -> close();
echo json_encode($data);
