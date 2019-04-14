	<?php
	$servername = "localhost";
	$username = "pallabi";
	$password = "password";
	$dbname = "myDB";
	  $conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
	}
	
$name=$_POST["name"]; 
$reg_no=$_POST["reg_no"]; 
$department=$_POST["department"];
$gender=$_POST["gender"] ;
 $email=$_POST["email"] ;
$dob=$_POST["bday"];
$contact_no=$_POST["contack_no"];
$corres_address=$_POST["corres_address"];
$perm_address=$_POST["perm_address"];
$curr_sem=$_POST["current_sem"];
/*
$sem1=$_POST["sem1"];
$sem2=$_POST["sem2"];
$sem3=$_POST["sem3"];
$sem4=$_POST["sem4"];
$sem5=$_POST["sem5"];
$sem6=$_POST["sem6"];
$sem7=$_POST["sem7"];
$sem8=$_POST["sem8"];
$password=$_POST["password"];*/
$sql="update students set NAME='$name',DEPARTMENT='$department',GENDER='$gender',EMAIL='$email',DOB='$dob',CONTACT_NO='$contact_no',CORRES_ADDRESS='$corres_address',
PER_ADDRESS='$perm_address',CURRENT_SEM='$curr_sem'where REGISTRATION_NO ='$reg_no'";
if (!mysqli_query($conn,$sql))
  {
  echo("Error description: " . mysqli_error($conn));
  }

mysqli_close($conn);
header("Location: login_admin_h.php");
?>
