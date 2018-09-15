<?php
header("Content-type:application/json;charset=utf-8");
//$link =mysqli_connect('localhost','shuizhuyu','A570C5CCAE0a6c','shuizhuyu',3306);
$link =mysqli_connect('localhost','root','','xiang',3306);
mysqli_query($link,"SET NAMES utf8");

$name = @$_POST['username'];
$password = @$_POST['password'];
$email = @$_POST['email']; 
$publiccode = @$_POST['publiccode'];  

if($link){
    if($publiccode=="564s5"||$publiccode=="53d21"||$publiccode=="66p66"||$publiccode=="32q10"||$publiccode=="25e55"){
        $sql="select * FROM `user` WHERE `name`= '{$name}'";//  '小明'  {$name}  这里还必须带引号
        $result=mysqli_query($link,$sql);
        $num=mysqli_num_rows($result);  //获取行数
        if($num){
            // echo "0";
            // echo json_encode("{"state":"0"}")
            $bc = array(
                        'code'=>'1',
            );
            echo json_encode($bc);
        } else{

            $sql="INSERT INTO `user` (`name`,`password`,`mail`) VALUES ('{$name}','{$password}','{$email}')" ;
            $result = mysqli_query($link,$sql);
            $abc = array(
                        'code'=>'ok',
            );
            echo json_encode($abc);
        };
    }else{
        $bc = array(
                    'code'=>'2',
        );
        echo json_encode($bc);
    }
}
?>