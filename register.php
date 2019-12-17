<?php
/*
*Created by .
*User:Hcer
*Date:2019/11/20
*Time:19:19
*/

include_once 'db.php';
$userName = $_POST['userName'];
$userPwd = $_POST['userPwd'];

$sql = "SELECT * FROM admin WHERE user = '{$userName}'";

$result = $con -> query($sql);

if ($arr = $result -> fetch_assoc()){
    //用户名存在，不能注册
    $data = array(
        "code" => '0',
        "info" => '注册失败，用户名已存在!'
    );
}else{
    //可以注册
    $sql = "INSERT INTO admin (user,password) VALUES ('{$userName}','{$userPwd}')";
    if ($result = $con -> query($sql)){
        $data = array(
            "code" => '1',
            "info" => '注册成功!',
        );
    }else{
        //其他原因
        $data = array(
            "code" => '-1',
            "info" => "注册失败,原因:{$con -> connect_error}",
        );
    }
}

$con -> close();
echo json_encode($data);