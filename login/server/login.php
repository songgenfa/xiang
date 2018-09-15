<?php
header("Content-type:application/json;charset=utf-8");
//$link =mysqli_connect('localhost','shuizhuyu','A570C5CCAE0a6c','shuizhuyu',3306);
$link =mysqli_connect('localhost','root','','xiang',3306);
mysqli_query($link,"SET NAMES utf8");

$name = @$_POST['username'];
$password = @$_POST['password'];

if($link){
    $sql="select * FROM `user` WHERE `name`= '{$name}' and `password`= '{$password}' ";//  '小明'  {$name}  这里还必须带引号
    $result=mysqli_query($link,$sql);
    $num=mysqli_num_rows($result);  //获取行数
    if(!$num){
        $bc = array(
                    'code'=>'1',
        );
        echo json_encode($bc);
    } else{        
        $abc = array(
                    'code'=>'登录成功',
        );
        echo json_encode($abc);
    };
}
?>