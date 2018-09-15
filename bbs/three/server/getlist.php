<?php
header("Content-type:application/json; charset=UTF8"); //标明数据格式为json
//$link =mysqli_connect('localhost','shuizhuyu','A570C5CCAE0a6c','shuizhuyu',3306);
//$link =mysqli_connect('localhost','tbhzhuyu01','123456ASDF','tbhzhuyu01',3306);
$link =mysqli_connect('localhost','root','','xiang',3306);
if ($link) { //1
            $index=$_POST['index'];
            $sql = "select * FROM `answer` WHERE `sortid` ={$index} "; //选择来自news这张表的数据
            mysqli_query($link, "SET NAMES utF8");
            $result = mysqli_query($link, $sql); //最后的结果，在$link 这个文件里 找出$sql这张表里的值
            $senddata = array();
            while ($row = mysqli_fetch_assoc($result)) {//6
                array_push($senddata, array(
                                    'id' => $row['id'], 
                                    'creater' => $row['creater'], 
                                    'article' => $row['article'], 
                                    'nowdate' => $row['nowdate'], 
                                    'sortid' => $row['sortid'], 
                                    'zan' => $row['zan'],  
                                    'zan' => $row['zan'], 
                                    'cai' => $row['cai'], 
                                    'state' => $row['state'], 
                                ));
            }//6
            echo json_encode($senddata);
} //1
else {//执行成功的过程//2
	echo json_encode(array('链接信息' => '链接失败'));
   
};
mysqli_close($link);
?>

