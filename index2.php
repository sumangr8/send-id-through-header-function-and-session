<?php
session_start();
if(!isset($_SESSION["name"]))
{
	header("location:index.php");
}
$name=$_SESSION["name"];
//$getId = $_SESSION["id"]; session ke through id recive karna
$id=$_REQUEST['id'];  //recive id 
// echo $_REQUEST['id']; 
//echo $id;


$con=mysqli_connect("localhost","root","1990","message");
$qry=mysqli_query($con,"select * from message where user_id='$id'");
while($row=mysqli_fetch_array($qry))
{
	extract($row);
	echo $msg;
	echo "</br>";
}


?>