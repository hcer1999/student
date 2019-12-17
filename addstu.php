<?php
/*
*Created by .
*User:Hcer
*Date:2019/11/20
*Time:19:51
*/

include_once 'db.php';
//    name : name,
//    num : num,
//    sex : sex,
//    major : major
$Name = $_POST['name'];
$Num = $_POST['num'];
$Sex = $_POST['sex'];
$Major = $_POST['major'];

$sql = "select * from info where Num='{$Num}'";

$result = $con -> query($sql);

//$arr = mysqli_fetch_assoc($result);

if ($result -> num_rows > 0){
    //有数据代表学号存在
    $data = array(
        'code' => '0',
        'info' => '学号重复！'
    );
}else{
    //没有数据代表学号不存在
    $sql = "INSERT INTO info (Name,Num,Sex,Major) VALUES ('{$Name}','{$Num}','{$Sex}','{$Major}')";
    $result = $con -> query($sql);
    $data = array(
        'code' => '1',
        'info' => '添加成功！'
    );
}

$con -> close();
echo json_encode($data);