<?php
	session_start();
	$sname="localhost";
	$username="root";
	$pass="";
	$database="face";

$conn=mysqli_connect($sname,$username,$pass,$database);

if(!$conn)
{
	die("Failed to connect".mysqli_connect_error());
}
else
{
	echo "connection successfully";
}

mysqli_select_db($conn, 'face');

$name = $_POST['name'];
$pass = $_POST['psw'];

$q = " select * from user  where name = '$name' && password = '$pass' ";

$result = mysqli_query($conn, $q);

$num = mysqli_num_rows($result);


if($num == 1){
	echo" duplicate data ";
	header('location:register.php');
}
else{

	$qy= " insert  into user(name , password) values ('$name' , '$pass') ";
	mysqli_query($conn, $qy);
	header('location:login.php');
}

$conn->close();



?>
