<?php
session_start();
error_reporting(0);
include 'connection.php';
echo "Welcome " .$_SESSION['user_name'];
$userprofile=$_SESSION['user_name'];
// Log in achce kina check kortechi
if ($userprofile==true) {

}
else
	// Na takle login page e niye jabo
{
	header('Location:login.php');
}
// Otherwise nicher condition gulo kaj korbe

$query="SELECT * FROM student WHERE username='$userprofile'";
$data=mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($data);

echo $result['Subject'];




?>
<br>
<br>
<a href="logout.php">Log Out</a>

