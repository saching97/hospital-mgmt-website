<?php
session_start();
?>
<html>
<body>
<?php
$conn=mysqli_connect('localhost','root','','doctor');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error);
	}
$id=mysqli_real_escape_string($conn,$_POST['username']);
$pas=mysqli_real_escape_string($conn,$_POST['password']);
$s="SELECT id from doctor WHERE id= '$id' and pass='$pas'";
$sql=mysqli_query($conn,$s); 
$count=mysqli_num_rows($sql);
if($count==1)
{
	header('Location: DoctorHome.php');
	$_SESSION["id"] = $id;

}
else
{
	echo '<script language="javascript">';
	echo 'alert("!!! Invalid Doctor ID or Password !!!")';
	echo '</script>';
}
?>
</body>
</html>