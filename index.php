<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
	<form method="post" action="">
		<tr>
			<td>Email:</td><td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Password:</td><td><input type="text" name="password"></td>
		</tr>
		<tr>
			<td><input type="submit" name="l" value="Login"></td>
		</tr>
		</form>
	</table>

</div>
<?php
 	if(isset($_POST["l"]))
 	{
 		extract($_POST);
 		$con=mysqli_connect("localhost","root","1990","message");
 		$qry=mysqli_query($con,"select * from user where name='$name' and password='$password'");
 		$result=mysqli_fetch_array($qry);
 		if($result)
 		{
 			
 			session_start();
 			$getId = $result['id'];// url ke through id ko second page par vejna look header function
 			$_SESSION["name"]=$name; 
 			// $_SESSION["id"]=$getId;  session ke through id vejna
 			header("location:index2.php?id=$getId");
 		}
 		else
 		{
 			echo "NOT";
 		}
 	}
?></table>
</body>
</html>