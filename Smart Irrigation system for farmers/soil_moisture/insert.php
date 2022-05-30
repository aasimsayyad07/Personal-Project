<?php
if(isset($_GET['moist'])){
    $moist=$_GET['moist'];
    $filepath=realpath(dirname("soil_moisture"));
    require_once($filepath."/db_connect.php");
    $db=new DB_CONNECT();
    $result=mysql_query("INSERT into soil_moisture_status(moisture)values('$moist')");
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