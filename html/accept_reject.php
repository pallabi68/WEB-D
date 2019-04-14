

<?php
$servername = "localhost";
$username = "pallabi";
$password = "password";
$dbname = "myDB";
$number="";
$choice=$_GET["number"];

$reg_no=$_GET["reg_no"];
//echo "reg_no".$reg_no;

//IF A STUDENT IS ACCEPTED
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($choice =="accept"){
//echo '<h2>YOU ARE ACCEPTED</h2>';

$sql = "SELECT * from new_students where REGISTRATION_NO = '$reg_no'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
    
    $msg = "YOU HAVE BEEN SUCCESFULLY REGISTERD \n WELCOME";
    $msg = wordwrap($msg,70);
    mail($row["EMAIL"],"NITDRegistrationConfirmation",$msg);

       $sql="insert into students select * from new_students where REGISTRATION_NO= '$row[REGISTRATION_NO]'";
         $res = $conn->query($sql);
         if ($conn->query($sql) === TRUE) {
         echo "New record created successfully";
         } 
         else {
        echo "Error: " . $sql . "<br>" . $conn->error;
         }
         
         $sql = "DELETE from new_students where REGISTRATION_NO = '$reg_no'";   
         $res = $conn->query($sql); 
        
        }
        }
         header("Location: login_admin.php?choice=2");
  /*      
      echo'     <html>
   <head>
      <title>HTML Meta Tag</title>
      <meta http-equiv = "refresh" content = "2; url = login_admin.php?name=1/>
   </head>
   <body>
      
   </body>
</html>';*/
}

else {
//stuent rejected
         $sql = "SELECT * from new_students where REGISTRATION_NO = '$reg_no'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
   
    		while($row = $result->fetch_assoc()) {
    
    $msg = "SORRY! YOUR REGISTRATION REQUEST IS NOT ACCEPTED \n";
    $msg = wordwrap($msg,70);
    mail($row["EMAIL"],"NITDRegistrationDeclined",$msg);
    }
    }
 
         $sql = "DELETE from new_students where REGISTRATION_NO = '$reg_no'";   
          header("Location: login_admin.php?choice=2");
}

?> 
<html>
