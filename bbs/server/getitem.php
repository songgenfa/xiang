<?php
header("Content-type:application/json;charset=utf-8");
//$link =mysqli_connect('localhost','shuizhuyu','A570C5CCAE0a6c','shuizhuyu',3306);
$link =mysqli_connect('localhost','root','','xiang',3306);

if($link){
    $id=$_GET['id'];//这里应该是get。果然是这个问题；
    mysqli_query($link,"SET NAMES utf8");
    $sql = "select * FROM `cars` WHERE `id` ={$id} ";//这里大小写看不出明显的区别
    $result =mysqli_query($link,$sql);
    $senddata =array();
    while($row = mysqli_fetch_assoc($result)){
             array_push($senddata, array(
                                    'id' => $row['id'], //这个是数据库的值返回到js页面
                                    'kind' => $row['kind'], 
                                    'fromplace' => $row['fromplace'], 
                                    'toplace' => $row['toplace'], 
                                    'dater' => $row['dater'], 
                                    'timer' => $row['timer'], 
                                    'num' => $row['num'], 
                                    'createtime' => $row['createtime'], 
                                    'creater' => $row['creater'], 
                                    'phone' => $row['phone'], 
                                    'sayelse' => $row['sayelse'], 
             ));
        }
    echo json_encode($senddata);
}
?>