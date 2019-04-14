<?php
$reg_no=$_GET["reg_no"];
$servername = "localhost";
$username = "pallabi";
$password = "password";
$dbname = "myDB";
$num=rand(1, 1000000);
$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
	}
	$sql = "select EMAIL from students where  REGISTRATION_NO = '$reg_no'";
	 $result = $conn->query($sql);
	 if ($conn->query($sql) === TRUE) {
         echo "New record created successfully";
		} else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
          }
        if ($result->num_rows > 0) {
       
          while($row = $result->fetch_assoc()) {  
               $email=$row["EMAIL"];
               }
               }
      $conn->close();
      
      
    $msg = "YOUR OTP FOR RESETTING PASSWORD  IS ".$num."\n THANK YOU";
    $msg = wordwrap($msg,70);
   mail($email,"OTP for password_reset",$msg);
   
    echo '
      <!DOCTYPE html>
<html lang="en">
<head>
<title>forgetpassword</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="common.css">
</head>
<body>

<div class="header">
  <a href="home.html"><img class=logo src="https://upload.wikimedia.org/wikipedia/ta/d/d1/NIT_Durgapur_Logo.png" alt=nitdgp_logo_/></a>
  <h1>NATIONAL INSTITUTE OF TECHNOLOGY , DURGAPUR</h1>
</div>

<div class="topnav">
  <a href="home.html">HOME</a>
  <a href="test.html">STUDENT REGISTRATION</a>
  <a href="login_admin.html">ADMIN LOGIN</a>
  <a href="contact.html">CONTACT</a>
</div>

<div class="row">
  <div class="column">

  </div>

  <div class="column" id="example1">
   <h2><span>E</span>NTER <span>O</span>TP <span>S</span>ENT <span>I</span>N <span>Y</span>OUR <span>E</span>MAIL</h2>

    
    
    
     <form action="password_reset.php" method="get">
       OTP: <input type="text" name="otp"><br><br>
      <input  name="a_otp" type="hidden" value='.$num.'>
      <input  name="reg_no" type="hidden" value='.$reg_no.'>
      <input type="submit">
      </form>
      
      
      
      </div>

  <div class="column">

  </div>
</div>

</body>
</html>'  
      ;
 ?>   
