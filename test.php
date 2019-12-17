<?php
/*
*Created by .
*User:Hcer
*Date:2019/11/23
*Time:16:32
*/

include_once 'db.php';


$sql = 'select * from info';


$result = $con -> query($sql);

var_dump($con);

if ($result -> num_rows > 0){
    while ($row = $result -> fetch_assoc()){
        print_r($row) ;
    }
}else{
    echo '查询失败！！'  . $con -> connect_error;
}

//$d = array();
//while ($arr = mysqli_fetch_assoc($result)){
//    array_push($d,$arr);
//}
//
//echo json_encode($d);

$con -> close();