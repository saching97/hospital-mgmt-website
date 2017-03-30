<html>
<body>
<?php
$conn=mysqli_connect('localhost','root','','doctor');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error);
	}
$pid=$_POST['pid'];
$dname=$_POST['dname'];
$ra=$_POST['ra'];
$rb=$_POST['rb'];
$rc=$_POST['rc'];
$rd=$_POST['rd'];
$re=$_POST['re'];
$com=$_POST['comm'];
$rating=($ra+$rb+$rc+$rd+$re)/5;
$sql="INSERT INTO feedback(doc_name,pat_id,comment,rating) values('$dname','$pid','$com','$rating')";  
if (mysqli_query($conn,$sql)) 
{
	header("Location:PatientHome.html");
   echo "<script>alert('...Thank You for your valuable feedback...')</script>";
} 
else 
{     echo "Error: " . $sql . "<br>" . mysqli_error($conn); }
mysqli_close($conn);
?>
</body>
</html>