<?php
header("Content-type:application/json; charset=UTF8"); //标明数据格式为json
//$link =mysqli_connect('localhost','shuizhuyu','A570C5CCAE0a6c','shuizhuyu',3306);
$link =mysqli_connect('localhost','root','','xiang',3306);
if ($link) {
      $sql = "select * FROM `bbs` WHERE `state` =1 ";
            mysqli_query($link, "SET NAMES utF8");
            $result = mysqli_query($link, $sql);
            $senddata = array();
            while ($row = mysqli_fetch_assoc($result)) {//6
                array_push($senddata, array(
                                    'id' => $row['id'], 
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
                                    'nowdate' => $row['nowdate'] 
                                ));
            }//6
            echo json_encode($senddata);
            // $abc = array(
            //         'success'=>'ok',
            // );
            // echo json_encode($abc);
} //1
else {//执行成功的过程//2
	$abc = array(
                    'success'=>'连接失败',
      );
      echo json_encode($abc);
   
};
mysqli_close($link);
?>