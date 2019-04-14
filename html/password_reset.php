<?php
$a_otp=$_GET["a_otp"];
$otp=$_GET["otp"];
$reg_no=$_GET["reg_no"];
if($a_otp== $otp){
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
   <h2><span>R</span>ESET <span>P</span>ASSWORD</h2>




  
  
  <form action="password_edit.php" method="get">
   PASSWORD:<input type="password" name="pass"><br><br>
   CONFIRM PASSWORD: <input type="password" name="confirm"><br><br>
   <input type="hidden" name="reg_no" value='.$reg_no.'>
   <input type="submit">
   
   
   
   </div>

  <div class="column">

  </div>
</div>

</body>
</html>  
   ';
   }
   else {
    echo'<h1>ENTERED A WRONG OTP</h1>';
    }
?>   
   
