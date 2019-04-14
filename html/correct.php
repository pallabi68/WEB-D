<?php
$servername = "localhost";
$username = "pallabi";
$password = "password";
$dbname = "myDB";

$r_no=$_GET['reg_no'];
$psw="";
//$psw=$_SESSION["t2"];    
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from students where REGISTRATION_NO = '$r_no' and PASSWORD ='$psw'";
$result = $conn->query($sql);
$r="";
if ($result->num_rows > 0) {
$r=1;
echo 1;
}
else {
$r=0;
echo 0;
}

?>

