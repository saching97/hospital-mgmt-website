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
$s="SELECT id from patient WHERE id= '$id' and pass='$pas'";
$sql=mysqli_query($conn,$s); 
$count=mysqli_num_rows($sql);
if($count==1)
{
	header('Location: PatientHome.php');
	$_SESSION["id"] = $id;
}
else
{
	header('Location: LabHome.html');
	echo '<script language="javascript">';
	echo 'prompt("!!! Invalid Patient ID or Password !!!")';
	echo '</script>';
	
}
?>
</body>
</html>