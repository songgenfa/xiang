<?php
header("Content-type:application/json;charset=utf-8");
//$link =mysqli_connect('localhost','shuizhuyu','A570C5CCAE0a6c','shuizhuyu',3306);
//$link =mysqli_connect('localhost','tbhzhuyu01','123456ASDF','tbhzhuyu01',3306);
$link =mysqli_connect('localhost','root','','xiang',3306);
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
    $publiccode = @$_POST['publiccode'];
    if($publiccode=="564s5"||$publiccode=="53d21"||$publiccode=="66p66"||$publiccode=="32q10"||$publiccode=="25e55"){
        $sql="INSERT INTO `party` (`name`,`timer`,`area`,`kind`,`creater`,`toman`,`jianjie`) VALUES ('{$name}','{$timer}','{$area}','{$kind}','{$creater}','{$toman}','{$jianjie}')" ;
            $result = mysqli_query($link,$sql);
             if($result){
                $abc = array(
                           'code'=>'1',
                );
                echo json_encode($abc);
            }
            else{
                 echo mysql_error();
            }
    }else{
        $abc = array(
                   'code'=>'2',
        );
        echo json_encode($abc);
    }
}else{
    $abc = array(
               'code'=>'0',
    );
    echo json_encode($abc);
}
?>