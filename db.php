<?php
/*
*Created by .
*User:Hcer
*Date:2019/11/20
*Time:19:07
*/

header("Content-Type: text/html;charset=UTF-8");

$db_host = '127.0.0.1';

$db_user = 'root';

$db_pwd = 'root';

$db_name = 'student';

$con = new mysqli($db_host,$db_user,$db_pwd,$db_name);

if ($con -> connect_error){
    die('数据库连接失败，错误代码：' . $con ->connect_error);
}


$con -> query('set names UTF8');
