<?php
error_reporting(0);
$host='localhost';                  //database host name
$user='root';                       //user
$password='';                       //password
$dbname='note_record';              //database name

$link=  mysqli_connect($host,$user,$password,$dbname);

if(mysqli_connect_errno()){
    $arr=['error'=> mysqli_connect_error()];
    mysqli_close($link);
    echo json_encode($arr);
}else{
    if($_GET['t']=='jrGetInfo'){
        $tableName=$_POST['dbTableName'];
        $result=mysqli_query($link, "SELECT * FROM `$tableName`");
        if(mysqli_errno($link)){
            $arr=['error'=>mysqli_error($link)];
        }else{
            $result2= mysqli_query($link, "select `COLUMN_NAME` from `INFORMATION_SCHEMA`.`COLUMNS` where `TABLE_SCHEMA`='$dbname' and `TABLE_NAME`='$tableName'");
            if(mysqli_errno($link)){
                $arr=['error'=>mysqli_error($link)];
            } else {
                $arr=['rowNum'=>mysqli_num_rows($result),'columns'=> mysqli_fetch_all($result2)];    
            }
        }
        echo json_encode($arr);
    }else if($_GET['t']=='jrGetList'){
        $from=$_POST['start'];
        $limit=$_POST['limit'];
        $tableName=$_POST['dbTableName'];
        $result=mysqli_query($link, "SELECT * FROM `$tableName` limit $limit offset $from");
        if(mysqli_errno($link)){
            $arr=['error'=>mysqli_error($link)];
        }else{
            $arr= mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        echo json_encode($arr);
    }
}