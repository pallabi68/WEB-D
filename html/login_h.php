<?php

//include('start_session.php'); // Includes Login Script
session_start();
if(isset($_SESSION['login_user'])){
//echo "i am set";
header("location: login.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>studentlogin</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="common.css">



</head>
<body>

<div class="header">
  <a href="home.html"><img class='logo' src="https://upload.wikimedia.org/wikipedia/ta/d/d1/NIT_Durgapur_Logo.png" alt='nitdgp_logo_'/></a>
  <h1>NATIONAL INSTITUTE OF TECHNOLOGY , DURGAPUR</h1>
</div>

<div class="topnav">
  <a href="home.html">HOME</a>
  <a href="test.html">STUDENT REGISTRATION</a>
  <a href="login_h.php">STUDENT LOGIN</a>
  <a href="login_admin_h.php">ADMIN LOGIN</a>
  <a href="contact.html">CONTACT</a>
</div>

<div class="row">
  <div class="column">

  </div>

  <div class="column" id="example1">
   <h2><span>S</span>TUDENT <span>L</span>OGIN</h2>
    <form  method="GET" action="login_h.php" >
    
    <label for="reg_no"><b>USERNAME</label>
    <input type="text" placeholder="Enter Your Username" name="reg_no" id="reg_no" required>
<br>
<br>
     <label for="psw"><b>PASSWORD</label>
    <input type="password" placeholder="Enter your Password" name="psw" id="psw" required>
    <br><br>
      <font color="red"><div id="msg" ></div></font>
     <input  type="submit"   class="registerbtn"  id="submit" > 
 
     <p><font color="DarkBlue"> NOTE: Your Registration Number Is Your Username</font></p>
     <p><a href="forgot.html"><font color="red">ForgotPassword</font></a></p>
     <p><a href="test.html">Register Yourself!</a></p>
     
</form>
  </div>

  <div class="column">

  </div>
</div>

</body>
</html>

<?php
$servername = "localhost";
$username = "pallabi";
$password = "password";
$dbname = "myDB";
$r_no=$_GET["reg_no"];
$psw=$_GET["psw"];    
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from students where REGISTRATION_NO = '$r_no' and PASSWORD ='$psw'";
$result = $conn->query($sql);
//header("login.php");
if ($result->num_rows > 0) {
  // echo("hi");
   $_SESSION['login_user']=$r_no;
   $psw=$_SESSION['psw']=$psw;
  header("location: login.php");
}
else {
if($r_no!="" && $psw!=""){
 echo "<script>
         document.getElementById('msg').innerHTML='THE USERNAME OR THE PASSWORD YOU HAVE ENTERED IS WRONG'; 
   </script> ";
 }

}


?>

