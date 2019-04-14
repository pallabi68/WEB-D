<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="common.css">
<?php

//include('start_session.php'); // Includes Login Script
session_start();
if(isset($_SESSION['login_admin'])){
//echo "i am set";
header("location: admin_session.php");
}
?>
<script>
function myFunction(){
var name=document.getElementById("name").value;
var psw=document.getElementById("psw").value;

if(psw!="1234" || name!="1234"){
alert("THE PASSWORD OR THE USERNAME YO HAVE ENTERED IS WRONG");
return false;
}
return true;
}
</script>
</head>
<body>

<div class="header">
  <a href=""><img class='logo' src="./img.png" alt='nitdgp_logo_'/></a>
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
