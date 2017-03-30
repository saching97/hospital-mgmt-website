<html>
<body>
<?php
$conn=mysqli_connect('localhost','root','','doctor');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error);
	}
$name=$_POST['doctors'];
$name=explode(" ",$name);
$fname=$name[0];
$lname=$name[1];
$sql="SELECT id from doctor where fname=$fname and lname=$lname" ;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) >0) {
	while($row = mysqli_fetch_assoc($result)) {
				echo "<table>";
				echo "<tr>";
				echo "<td>ID:</td> " . "<td>".$row["id"]."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Name:</td>" . "<td>".$row["fname"]. " " . $row["lname"]."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Gender:</td>" . "<td>".$row["gender"] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Phone:</td>" . "<td>".$row["phone"] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Email:</td>" . "<td>".$row["email"] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Medical History:</td>" . "<td>".$row["spec"] . "</td>";
				echo "</tr>";
				echo "</table>";
			}
}
else
{
	echo "0 results found !";	
}
?>
</body>
</html>