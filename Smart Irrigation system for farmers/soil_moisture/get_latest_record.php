<?php
$filepath=realpath(dirname("soil_moisture"));
require_once($filepath."/db_connect.php");
$db=new DB_CONNECT();
$result=mysql_query("SELECT * from soil_moisture_status where id=(select max(id) from soil_moisture_status)") or die(mysql_error());
$response=array();
if($result!=null)
{
    $row=mysql_fetch_array($result);
    $response["id"]=$row["id"];
    $response["moisture"]=$row["moisture"];
    
    $response["success"]=1;
    
    echo json_encode($response);
}
else
{
    $response["success"]=0;
        echo json_encode($response);

}

?>