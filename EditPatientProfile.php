<?php
session_start();
$conn=mysqli_connect('localhost','root','','doctor');
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error);
}
$sql="SELECT * from patient where id='".$_SESSION['id']."'" ;
$result = mysqli_query($conn, $sql);
?>

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
				<li><a data-toggle="tab" href="EditPatientProfile.php">Edit</a></li> 
				<li><a data-toggle="tab" onclick="logout()">Logout</a></li>
			</ul>
		</div>
		<div>
			<form action = "patientAlteration.php" method = "post">
				<div class="col-sm-offset-2 col-sm-8">
					Patient ID: <input type = "text" name = "pid" id = "pid" maxlength = "25" 
					<?php 
					
					while($row = mysqli_fetch_assoc($result))
					{echo 'value="';echo '$row["id"]'.'"';}?> readonly/> 
				</div>
				<div class="col-sm-offset-2 col-sm-8">
					First Name: <input type = "text" name = "fname" id = "pfname" maxlength = "25" <?php 
					echo 'value="';
					while($row = mysqli_fetch_assoc($result)){echo '$row["fname"]'.'"';}?> required/> 
				</div>
				<div class="col-sm-offset-2 col-sm-8">
					Last Name: <input type = "text" name = "lname" id = "plname" maxlength = "25" <?php 
					echo 'value="';
					while($row = mysqli_fetch_assoc($result)){echo '$row["lname"]'.'"';}?> required/> 
				</div>
				<div class="col-sm-offset-2 col-sm-8">
					Age: <input type = "number" name = "age" id = "age" min = "15" max = "99" <?php 
					echo 'value="';
					while($row = mysqli_fetch_assoc($result)){echo '$row["age"]'.'"';}?> required/> 
				</div>
				<div class="col-sm-offset-2 col-sm-8">
					<br/>Phone No. : <input type = "number" name = "pnum" id = "pnum" <?php 
					echo 'value="';
					while($row = mysqli_fetch_assoc($result)){echo '$row["phone"]'.'"';}?> required/> 
				</div>
				<div class="col-sm-offset-2 col-sm-8">
					Email: <input type = "email" name = "pmail" id = "pmail" maxlength = "25" <?php 
					echo 'value="';
					while($row = mysqli_fetch_assoc($result)){echo '$row["email"]'.'"';}?> required/> 
				</div>
				<!--div class="col-sm-offset-2 col-sm-8">
					Password: <input type = "password" name = "password" id = "password" maxlength = "25" placeholder="Enter password"/> 
				</div-->
				<div class="col-sm-offset-2 col-sm-8">
				<textarea rows="20" cols="50" name="phistory" <?php 
					echo 'value="';
					while($row = mysqli_fetch_assoc($result)){echo '$row["spec"]'.'"';}?> required></textarea>
				</div>
				<div class="col-sm-offset-2 col-sm-8" align = "center">
					<br/><input type = "submit" value = "Edit"/>
				</div>
			</form>
		</div>
		
		
		
		
	</div>
</body>
</html>