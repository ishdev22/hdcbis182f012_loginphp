<?php

session_start(); 
$error=''; 
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid!";
}
else
{
$username=$_POST['username'];
$password=$_POST['password'];

$connection = mysql_connect("localhost", "root", "");

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$db = mysql_select_db("company", $connection);

$query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
$rows = mysql_num_rows($query);
$result = mysqli_query($connection,$query);


if($rows = mysqli_fetch_array($result))
	{
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['LAST_REQUEST_TIME'] = time();
		header("Location:homepage.php");
	}
	else
	{
		echo "Invalid Username or Password !!";
	}


mysql_close($connection); 
}
}
?>




<html>


<html>
<head><title>Login Page</title>
</head>

<body>
	<form name="frmlogin" method="post" action="#">
	User name : <input type="text" name="txtuname"/><br>
	Password : <input type="password" name="txtpw"/><br>

		<input type="submit" name="btnsubmit" value="Login"/>
		<input type="reset" name="btnreset" value="Reset"/>
	</form>
</body>
</html>





