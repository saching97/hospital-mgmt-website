<html>
<body>
<?php
$conn=mysqli_connect('localhost','root','','doctor');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error);
	}
$id=$_POST['username'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$gender=(!empty($_POST['Dsex']) ? $_POST['Dsex'] : null);
$phone=$_POST['dnum'];
$email=$_POST['dmail'];
$pass=$_POST['password'];
$spec=$_POST['dspec'];
$sql="INSERT INTO doctor(id,fname,lname,age,gender,phone,email,pass,spec) values('$id','$fname','$lname','$age','$gender','$phone','$email','$pass','$spec')";  
if (mysqli_query($conn,$sql)) 
{
   echo "...Doctor Registration Successful...";
} 
else 
{     echo "Error: " . $sql . "<br>" . mysqli_error($conn); }
mysqli_close($conn);
?>
</body>
</html>