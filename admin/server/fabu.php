<?php
header("Content-type:application/json;charset=utf-8");
//$link =mysqli_connect('localhost','shuizhuyu','A570C5CCAE0a6c','shuizhuyu',3306);
$link =mysqli_connect('localhost','root','','xiang',3306);
mysqli_query($link,"SET NAMES utf8");
        
if($link){
    $kind = @$_POST['kind'];
    $title = @$_POST['title'];
    $article = @$_POST['article'];
    $creater = @$_POST['creater'];
    $dater = @$_POST['dater'];
    $nowdate = @$_POST['nowdate'];
    $timer = @$_POST['timer'];
    $state = @$_POST['state'];

    $sql="INSERT INTO `bbs` (`kind`,`title`,`article`,`dater`,`nowdate`,`timer`,`state`,`creater`) VALUES ('{$kind}','{$title}','{$article}','{$dater}','{$nowdate}','{$timer}','{$state}','{$creater}')" ;
        $result = mysqli_query($link,$sql);
         $abc = array(
                    'success'=>'ok',
         );
        echo json_encode($abc);
}
?>