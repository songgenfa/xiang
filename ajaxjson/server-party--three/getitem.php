<?php
header("Content-type:application/json; charset=UTF8"); //标明数据格式为json
//地址 用户  密码   文件名   端口
$link =mysqli_connect('localhost','shuizhuyu','A570C5CCAE0a6c','shuizhuyu',3306);
//$link =mysqli_connect('localhost','root','','xiang',3306);
if ($link) { //1
            $id=$_GET['id'];
            // $sql = 'SELECT * FROM party'; //选择来自news这张表的数据
            $sql = "select * FROM `party` WHERE `id` ={$id} ";//这里大小写看不出明显的区别1
            mysqli_query($link, "SET NAMES utF8");
            $result = mysqli_query($link, $sql); //最后的结果，在$link 这个文件里 找出$sql这张表里的值
            $senddata = array();
            while ($row = mysqli_fetch_assoc($result)) {//6
                array_push($senddata, array(
                                    'id' => $row['id'], //这个是数据库的值返回到js页面
                                    'timer' => $row['timer'], 
                                    'name' => $row['name'], 
                                    'area' => $row['area'], 
                                    'kind' => $row['kind'], 
                                    'creater' => $row['creater'], 
                                    'jianjie' => $row['jianjie'], 
                                    'state' => $row['state']
                                ));
            }//6
            echo json_encode($senddata);
} //1
else {//执行成功的过程//2
	echo json_encode(array('链接信息' => '链接失败'));
   
};
mysqli_close($link);
?>