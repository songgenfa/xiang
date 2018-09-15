<?php
header("Content-type:application/json;charset=utf-8");
$link =mysqli_connect('localhost','tbhzhuyu01','123456ASDF','tbhzhuyu01',3306);
//$link =mysqli_connect('localhost','shuizhuyu','A570C5CCAE0a6c','shuizhuyu',3306);
// $link =mysqli_connect('localhost','root','','xiang',3306);
mysqli_query($link,"SET NAMES utf8");
        
if($link){
    $id = @$_POST['id'];
    $housenum = @$_POST['housenum'];
    $mianji = @$_POST['mianji'];
    $huxing = @$_POST['huxing'];
    $name = @$_POST['name'];
    $phone = @$_POST['phone'];
    $suozaidi = @$_POST['suozaidi'];
    $state = @$_POST['state'];
    $sale = @$_POST['sale'];
    $zujin = @$_POST['zujin'];

    $sql="UPDATE `shangjun` SET  `housenum`='{$housenum}',`mianji`='{$mianji}',`huxing`='{$huxing}',`name`='{$name}',`phone`='{$phone}',`suozaidi`='{$suozaidi}',`state`='{$state}',`sale`='{$sale}',`zujin`='{$zujin}' where `id`={$id}    ";
        $result = mysqli_query($link,$sql);
         $abc = array(
                    'success'=>'ok',
         );
        echo json_encode($abc);
}
?>
