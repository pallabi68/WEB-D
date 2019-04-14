<html>
<body>

<h1>You are succesfully registered </h1>

Name: <?php echo $_GET["name"]; ?>
<br>
Email address : <?php echo $_GET["email"]; ?>
<br>
Department : <? $_GET["department"]; ?>
<br>
Registration No : <?php echo $_GET["registration_no"] ?>
<br>
gender : <?php echo $_GET["gender"] ?>
<br>
<br>
<br>
<?php

$servername = "localhost";
$username = "pallabi";
$password = "password";
$dbname = "myDB";



$name =$_GET["name"];

$email=$_GET["email"];
$dept=$_GET["department"];

$reg_no=$_GET["registration_no"];

$gender=$_GET["gender"];
$psw=$_GET["psw"];
$pswr=$_GET["psw-repeat"];
$cno=$_GET["contack_no"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO new_students
VALUES ('$name','$email','$dept','$reg_no','$gender','$cno','$psw')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?> 


<h5>Your Registration No is your user name for further login </h5>
<h3> In case you are deregistered you will be notified in your email adress </h3>
<h5>            Thank You </h5>
 
</body>
</html>
