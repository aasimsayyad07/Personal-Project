<?php
if(isset($_GET['temp'])&&isset($_GET['hum'])){
    $temp=$_GET['temp'];
    $hum=$_GET['hum'];
    date_default_timezone_set("Asia/Kolkata");
    $d=date("Y-m-d");
    $t=date("H:i:s");
    $check=date("i");
    
    $filepath=realpath(dirname("temperature"));
    require_once($filepath."/db_connect.php");
    $db=new DB_CONNECT();
    if($check>=50 or $check<=10){
    $result=mysql_query("INSERT into dht11_status(temperature,humidity,value_date,value_time,valid_for_graph)values('$temp','$hum','$d','$t',1)");}
    else{
        $result=mysql_query("INSERT into dht11_status(temperature,humidity,value_date,value_time,valid_for_graph)values('$temp','$hum','$d','$t',0)");
    }
    if($result){
        $response["success"]=1;
        $response["message"]="values inserted successfully.";
        echo json_encode($response);
    }
    else{
        $response["success"]=0;
        $response["message"]="values not inserted";
        echo json_encode($response);
    }
}
else{
    $response["success"]=0;
    $response["message"]="Parameters are missing";
    echo json_encode($response);
}
?>