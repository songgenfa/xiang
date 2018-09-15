<?php
header("Content-type:application/json;charset=utf-8");
//$link =mysqli_connect('localhost','shuizhuyu','A570C5CCAE0a6c','shuizhuyu',3306);
$link =mysqli_connect('localhost','root','','xiang',3306);

if($link){
    $index=$_POST['index'];//
    mysqli_query($link,"SET NAMES utf8");
    $sql = "select * FROM `bbs` WHERE `id` ={$index} ";//这里大小写看不出明显的区别
    $result =mysqli_query($link,$sql);
    $senddata =array();
    while($row = mysqli_fetch_assoc($result)){
             array_push($senddata, array(
                                    'id' => $row['id'], //这个是数据库的值返回到js页面
                                    'kind' => $row['kind'],
                                    'creater' => $row['creater'], 
                                    'title' => $row['title'], 
                                    'article' => $row['article'], 
                                    'dater' => $row['dater'], 
                                    'timer' => $row['timer'], 
                                    'zan' => $row['zan'],  
                                    'zan' => $row['zan'], 
                                    'cai' => $row['cai'], 
                                    'state' => $row['state'], 
                                    'nowdate' => $row['nowdate'], 
             ));
        }
    echo json_encode($senddata);
}
?>