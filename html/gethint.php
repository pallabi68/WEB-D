<?php

$servername = "localhost";
$username = "pallabi";
$password = "password";
$dbname = "myDB";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 

$reg_no=$_GET["reg_no"]; 
$sql=$sql = "SELECT * from students where REGISTRATION_NO = '$reg_no'";
if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  if($rowcount>0){
   echo "1";
   }
   else {
   echo "0";
   }
   }
 ?>  
   
