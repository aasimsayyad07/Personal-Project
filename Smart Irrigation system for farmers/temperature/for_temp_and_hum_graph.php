<?php
$i=0;
$response=array();
date_default_timezone_set("Asia/Kolkata");
$today=date("Y-m-d");
$yesterday=strtotime("yesterday");
$yesterday=date("Y-m-d",$yesterday);
$filepath=realpath(dirname("temperature"));
require_once($filepath."/db_connect.php");
$db=new DB_CONNECT();
$result=mysql_query("select * from dht11_status where valid_for_graph=1 and value_date='$today'") or die(mysql_error());
if($result!=null){
while($row=mysql_fetch_array($result)){
    $response[$i]["id"]=$row["id"];
    $response[$i]["temperature"]=$row["temperature"];
    $response[$i]["humidity"]=$row["humidity"];
    $response[$i]["value_date"]=$row["value_date"];
    $response[$i]["value_time"]=$row["value_time"];
    $response[$i]["valid_for_graph"]=$row["valid_for_graph"];
    $response[$i]["today"]=1;

$i++;
}
}
else{
    $response["success"]=0;
}


$result1=mysql_query("select * from dht11_status where valid_for_graph=1 and value_date='$yesterday'") or die(mysql_error());
if($result1!=null){
    while($row1=mysql_fetch_array($result1)){
        $response[$i]["id"]=$row1["id"];
        $response[$i]["temperature"]=$row1["temperature"];
        $response[$i]["humidity"]=$row1["humidity"];
        $response[$i]["value_date"]=$row1["value_date"];
        $response[$i]["value_time"]=$row1["value_time"];
        $response[$i]["valid_for_graph"]=$row1["valid_for_graph"];
        $response[$i]["today"]=0;
        $i++;
    }
}
else{
    $response["success1"]=1;
}
echo json_encode($response);
?>