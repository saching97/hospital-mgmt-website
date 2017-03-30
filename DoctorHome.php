<?php
session_start();?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">    
    <link rel="stylesheet" href="external/css1.css">
    <link rel="stylesheet" href="external/css2.css">
    <script src="external/jq1.js"></script>
    <script src="external/jq2.js"></script>
	<title>Efficient Health Portal</title>
</head>
<body style = "background:url(Test.jpg);background-repeat:no-repeat;background-size:cover">
	<div class = "container" style = "background-color:white;padding:4%;opacity:0.9">
		<div style = "text-align:right">
			<ul class="nav nav-pills pull-right">
				<li><a data-toggle="tab" onclick="edit()">Edit</a></li> 
				<li><a data-toggle="tab" onclick="logout()">Logout</a></li>
			</ul>
		</div>
		<h1>Welcome, <?php echo $_SESSION['id'] ?></h1>
		
		<?php
		$conn=mysqli_connect('localhost','root','','doctor');
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error);
			}
		$sql="SELECT * from doctor where id='".$_SESSION['id']."'" ;
		$result = mysqli_query($conn, $sql);
	
		if (mysqli_num_rows($result) > 0) {
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
				echo "<td>Specialization:</td>" . "<td>".$row["spec"] . "</td>";
				echo "</tr>";
				echo "</table>";
			}
		} else {
			echo "0 results";
		}
			
		?>
		<br/>
		<h5>Patient Search</h5> <!--!!Link to patient's profile pending!!-->
		<table><tr>
		<td>
		<form action="DoctorHome.php" method="get">
		Search by Patient name:</td>
		<td>
		<input list="doctors" name="doctors">
		<datalist id="doctors">
			<?php
			$conn=mysqli_connect('localhost','root','','doctor');
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error);
			}
			$sql="SELECT fname, lname from patient" ;
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)){
				echo '<option value = "'. $row["fname"]. " " . $row["lname"] .'"/>';
				}
			}
			?>
		</datalist>
		</td><td><input type="submit" value = "Get details"/></td>
		</form>
		</tr>
		
		<tr>
		<td>
		<form action="DoctorHome.php" method="get">
		Search by Patient id:</td>
		<td>
		<input list="patientsid" name="patientsid">
		<datalist id="patientsid">
			<?php
			$sql="SELECT id from patient" ;
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)){
				echo '<option value = "'. $row["id"] .'"/>';
				}
			}
			?>
		</datalist>
		</td><td><input type="submit" value = "Get details"/></td>
		</form>
		</tr>
		</table>
		
	</div>
	<script>
	function logout() {
		location.href = 'Logout.php';
	}
	function edit(){
		location.href='EditDoctorProfile.php';
	}
	</script>

</body>
</html>
