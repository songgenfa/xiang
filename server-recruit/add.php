<?php
header("Content-type:application/json;charset=utf-8");
$link =mysqli_connect('localhost','shuizhuyu','A570C5CCAE0a6c','shuizhuyu',3306);
//$link =mysqli_connect('localhost','root','','xiang',3306);
mysqli_query($link,"SET NAMES utf8");
        
if($link){
    $kind = @$_POST['kind'];
    $fromplace = @$_POST['fromplace'];
    $toplace = @$_POST['toplace'];
    $dater = @$_POST['dater'];
    $timer = @$_POST['timer'];
    $num = @$_POST['num'];
    $creater = @$_POST['creater'];
    $phone = @$_POST['phone'];
    $sayelse = @$_POST['sayelse'];

    $sql="INSERT INTO `cars` (`kind`,`fromplace`,`toplace`,`dater`,`timer`,`num`,`creater`,`phone`,`sayelse`) VALUES ('{$kind}','{$fromplace}','{$toplace}','{$dater}','{$timer}','{$num}','{$creater}','{$phone}','{$sayelse}')" ;
        $result = mysqli_query($link,$sql);
         $abc = array(
                    'success'=>'ok',
         );
        echo json_encode($abc);
}
?>