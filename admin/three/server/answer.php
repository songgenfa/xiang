<?php
header("Content-type:application/json;charset=utf-8");
//$link =mysqli_connect('localhost','shuizhuyu','A570C5CCAE0a6c','shuizhuyu',3306);
$link =mysqli_connect('localhost','root','','xiang',3306);
mysqli_query($link,"SET NAMES utf8");
        
if($link){
    $article = @$_POST['article'];
    $creater = @$_POST['creater'];
    $dater = @$_POST['dater'];
    $nowdate = @$_POST['nowdate'];
    $sortid = @$_POST['sortid'];
    $state = @$_POST['state'];

    $sql="INSERT INTO `answer` (`article`,`dater`,`nowdate`,`sortid`,`state`,`creater`) VALUES ('{$article}','{$dater}','{$nowdate}','{$sortid}','{$state}','{$creater}')" ;
        $result = mysqli_query($link,$sql);
         $abc = array(
                    'success'=>'ok',
         );
        echo json_encode($abc);
}
?>