<?php
header("Content-type:application/json;charset=utf-8");
//$link =mysqli_connect('localhost','shuizhuyu','A570C5CCAE0a6c','shuizhuyu',3306);
$link =mysqli_connect('localhost','root','','xiang',3306);
mysqli_query($link,"SET NAMES utf8");
        
if($link){
    $name = @$_POST['name'];
    $mincash = @$_POST['mincash'];
    $tocash = @$_POST['tocash'];
    $needcash = @$_POST['needcash'];
    $leader = @$_POST['leader'];
    $phone = @$_POST['phone'];
    $url = @$_POST['url'];
    $percent = @$_POST['percent'];
    $timer = @$_POST['timer'];

    $sql="INSERT INTO `cash` (`name`,`mincash`,`tocash`,`needcash`,`leader`,`phone`,`url`,`percent`,`timer`) VALUES ('{$name}','{$mincash}','{$tocash}','{$needcash}','{$leader}','{$phone}','{$url}','{$percent}','{$timer}')" ;
        $result = mysqli_query($link,$sql);
         $abc = array(
                    'success'=>'ok',
         );
        echo json_encode($abc);
}
?>