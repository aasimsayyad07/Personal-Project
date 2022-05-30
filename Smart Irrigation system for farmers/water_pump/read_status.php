<?php
$filepath=realpath(dirname("water_pump"));
require_once($filepath."/db_connect.php");
$db=new DB_CONNECT();
$result=mysql_query("select * from water_pump_status");
if($result)
{
    $row=mysql_fetch_array($result);
    $response["status"]=$row["status"];
    echo json_encode($response);
    echo("query successfull");
}
else{
    echo "query unsuccessfull";
}

?>