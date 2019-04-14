<!DOCTYPE html>
<?php


//include('start_session.php'); // Includes Login Script
session_start();
if(isset($_SESSION['login_admin'])){
//echo "i am set";
header("location: admin_session.php");
}
include('head.php');

?>




<script>
function myFunction(){
var str=document.getElementById("name").value;
var psw=document.getElementById("psw").value;
console.log(str);
console.log(psw);
if(str!="1234" || psw!="1234"){
document.getElementById("msg").innerHTML= "USERNAME OR PASSWORD IS WRONG";
 return false;
 }
else {
document.getElementById("msg").innerHTML= "";
 return true;
} 
}
</script>

   <h2><span>A</span>DMIN <span>L</span>OGIN</h2>
    <form action="admin_session.php" method="GET">
    <label for="reg_no"><b>USERNAME<b></label>
    <input type="text" placeholder="Enter Your Username" name="reg_no" id="name" required>
<br><br><br>

     <font color="red"><div id="msg" ></div></font>
     <label for="psw"><b>PASSWORD<b></label>
    <input type="password" placeholder="Enter your Password" name="psw" id="psw" required>
    <br>
    <input type="submit" class="registerbtn" onclick="return myFunction()" >
</form>
<?php
include('foot.php');
?>  
