<?php
if(isset($_GET['status'])){
    $status=$_GET['status'];
    $filepath=realpath(dirname("water_pump"));
    require_once($filepath."/db_connect.php");
    $db=new DB_CONNECT();
    $result=mysql_query("update water_pump_status set status=$status where id=1");
    if($result)
    {
        $response["status"]=$status;
        $response["success"]=1;
        $response["message"]="update successfully";
        echo json_encode($response);
    }
    else
    {
        $response["success"]=0;
        $response["message"]="update not successfull";
        echo json_encode($response);
    }
}
else{
    $response["success"]=0;
       $response["message"]="parameter missing";
       echo json_encode($response);
    
}
?>