<?php

include'server.php';
$Username=$_POST['Username'];
$Email Address=$_GET['email'];
$Password=$_POST['Password'];

$sql="insert into users values('$Username','$email','$Password');";

$query=mysqli_query($conn,$sql);

if($query)
echo"you have been successfully register..";
else
echo"register failed";

if (isset($_POST['register'])) {
	$username = mysql_real_escape_string($_POST['username']);
	$email = mysql_real_escape_string($_POST['email']);
	$password_1 = mysql_real_escape_string($_POST'password_1']);
	$password_2 = mysql_real_escape_string($_POST['password_2']);
	}
	if (empty($username)) {
		array_push($errors,"username is required");
	}
	if (empty($email)) {
		array_push($errors,"email is required");
	}
	if (empty($password_1)) {
		array_push($errors,"password is required");
	}
	
	if($password_1 != $password_2){
		array_push($errors, "the two password do not match");
	}
	
?>
