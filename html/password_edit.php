<?php 
$reg_no=$_GET["reg_no"];
$pass=$_GET["pass"];
$servername = "localhost";
	$username = "pallabi";
	$password = "password";
	$dbname = "myDB";
	  $conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
	}
	
	 echo "hi i edited the database".$pk;
	 $sql = "update students set PASSWORD='$pass' where  REGISTRATION_NO = '$reg_no'";
	 $result = $conn->query($sql);
	 if ($conn->query($sql) === TRUE) {
         echo "New record created successfully";
		} else {
        echo "Error: " . $sql . "<br>" . $conn->error;
          }
	 $conn->close();
	 header("Location: login.html");
?>
