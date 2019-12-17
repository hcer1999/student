<?php
/*
*Created by .
*User:Hcer
*Date:2019/11/20
*Time:19:15
*/

include_once 'db.php';

$userName = $_POST['userName'];
$userPwd = $_POST['userPwd'];


$sql = "SELECT * FROM admin WHERE user='{$userName}'";

$result = $con -> query($sql);

if ($row = $result -> fetch_assoc()){
    //账号是正确的
    if ($row['password'] == $userPwd){
        //密码正确
        $data = array(
            'code' => '1',
            'info' => '登录成功！'
        );
    }else{
        //密码错误
        $data = array(
            'code' => '0',
            'info' => '密码错误！'
        );
    }
}else{
    //用户名错误
    $data = array(
        'code' => '-1',
        'info' => '用户名错误！'
    );
}

$con -> close();
echo  json_encode($data);