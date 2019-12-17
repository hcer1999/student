<?php
/*
*Created by .
*User:Hcer
*Date:2019/11/22
*Time:19:07
*/

include_once 'db.php';

$mode = $_POST['mode'];//搜索方式
$content = $_POST['content'];//搜索内容


switch ($mode){
    case '0' :
        $mode = 'num';
        break;
    case  '1' :
        $mode = 'name';
        break;
    case '2' :
        $mode = 'major';
        break;
}

$sql = "select * from info where {$mode} like '%{$content}%'";

$result = $con -> query($sql);

if ($result -> num_rows > 0){
    //搜索有结果
    $dataArr = array();
    while ($row = $result -> fetch_assoc()){
        array_push($dataArr,$row);
    }
    $data = array(
        "code" => '1',
        "info" => $dataArr,
    );
}else{
    //搜索无结果
    $data = array(
        "code" => "0",
        "info" => "未找到与" . $content . "相关的数据!",
    );
}

$con -> close();
echo json_encode($data);

