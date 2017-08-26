<?php $con=mysqli_connect("localhost","root","1990","message"); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.user{
			float: left;
			width: 20%;
		}
		.form{
			width: 50%;
			float: right;
		}
	</style>
</head>
<body>
<div class="user">
<table>
	<tr>
		<td>
			<?php 
			$qry=mysqli_query($con,"select * from user");
			while($row=mysqli_fetch_array($qry))
			{
				extract($row);
				echo "<a href='index.php?user_id=$id'>$name</a>";
				echo "</br>";
			} 
			?>
		</td>
	</tr>
</table>
</div>


<div class="form">
	<table>
	<?php if(isset($_GET["user_id"]))
	{
		$user_id=$_GET["user_id"];
	?>

		<form method="post" action="">
			<tr>
				<td>Name:</td>
				<td>
					<?php
					$qry1=mysqli_query($con,"select * from user where id='$user_id'");
					$row1=@mysqli_fetch_array($qry1);
					@extract($row1);
					echo $name;
					?>
				</td>
			</tr>
			<tr>
				<td>Title</td><td><input type="text" name="title"></td>
			</tr>
			<tr>
				<td>Message</td><td><textarea name="msg"></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" name="s" value="Ok"></td>
			</tr>
			<?php
			if(isset($_POST["s"]))
			{
				extract($_POST);
				$qry2=mysqli_query($con,"INSERT INTO `message`(`user_id`, `title`, `msg`) VALUES('$id','$title','$msg')");
			}
			?>
		</form>
		<?php
		} ?>
	</table>
</div>
</body>
</html>