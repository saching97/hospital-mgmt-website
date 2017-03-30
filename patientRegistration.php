<html>
<body>
<?php
$conn=mysqli_connect('localhost','root','','doctor');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error);
	}
$id=$_POST['pid'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$gender=(!empty($_POST['Psex']) ? $_POST['Psex'] : null);
$phone=$_POST['pnum'];
$email=$_POST['pmail'];
$pass=$_POST['password'];
$spec=$_POST['phistory'];
$sql="INSERT INTO patient(id,fname,lname,age,gender,phone,email,pass,spec) values('$id','$fname','$lname','$age','$gender','$phone','$email','$pass','$spec')";  
if (mysqli_query($conn,$sql)) 
{
   echo "...Patient Registration Successful...";
} 
else 
{     echo "Error: " . $sql . "<br>" . mysqli_error($conn); }
mysqli_close($conn);
?>
</body>
</html>