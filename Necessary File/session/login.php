<?php
session_start();


include 'connection.php';


?>

<form action="" method="post">

	Username:<input type="text" name="username" value=""><br><br>
	Password:<input type="text" name="password" value=""><br><br>
	<input type="submit" name="submit" value="Login">
	
</form>

<?php

if (isset($_POST['submit'])) {
	// catch username and password
	$user=$_POST['username'];
	$pwd=$_POST['password'];
	// match username and password
	$query="SELECT *FROM student WHERE username='$user' AND  password='$pwd'";
	$data=mysqli_query($conn,$query);
	// data gulo kono akta existing datar sathe mille 1 otherwise 0
	$result=mysqli_num_rows($data);
	if ($result==1) {
		// session diye username ta dortechi
		$_SESSION['user_name']=$user;
		header('Location:home.php');
	}
	else
	{
		echo "Log in failed";
	}

}


?>