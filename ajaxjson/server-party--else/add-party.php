<?php
header("Content-type:application/json;charset=utf-8");
$link =mysqli_connect('localhost','shuizhuyu','A570C5CCAE0a6c','shuizhuyu',3306);
//$link =mysqli_connect('localhost','root','','xiang',3306);
mysqli_query($link,"SET NAMES utf8");
        
if($link){
    //echo "连接成功";
    $name = @$_POST['name'];
    $timer = @$_POST['timer'];
    $area = @$_POST['area'];
    $kind = @$_POST['kind'];
    $creater = @$_POST['creater'];
    $toman = @$_POST['toman'];
    $jianjie = @$_POST['jianjie']; 

    $sql="INSERT INTO `party` (`name`,`timer`,`area`,`kind`,`creater`,`toman`,`jianjie`) VALUES ('{$name}','{$timer}','{$area}','{$kind}','{$creater}','{$toman}','{$jianjie}')" ;
        $result = mysqli_query($link,$sql);
         if($result){
            echo "插入成功";
        }
        else{
             echo mysql_error();
        }
}else{
 echo "连接失败后;台";
}
?>