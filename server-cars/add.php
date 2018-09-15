<?php
header("Content-type:application/json;charset=utf-8");
//$link =mysqli_connect('localhost','shuizhuyu','A570C5CCAE0a6c','shuizhuyu',3306);
//$link =mysqli_connect('localhost','tbhzhuyu01','123456ASDF','tbhzhuyu01',3306);
$link =mysqli_connect('localhost','root','','xiang',3306);
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
    $publiccode = @$_POST['publiccode'];
    if($publiccode=="564s5"||$publiccode=="53d21"||$publiccode=="66p66"||$publiccode=="32q10"||$publiccode=="25e55"){
        $sql="INSERT INTO `cars` (`kind`,`fromplace`,`toplace`,`dater`,`timer`,`num`,`creater`,`phone`,`sayelse`) VALUES ('{$kind}','{$fromplace}','{$toplace}','{$dater}','{$timer}','{$num}','{$creater}','{$phone}','{$sayelse}')" ;
            $result = mysqli_query($link,$sql);
             $abc = array(
                        'code'=>'1',
             );
            echo json_encode($abc);
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