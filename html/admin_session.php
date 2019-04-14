<script>
function fun(){
var choice=document.getElementById("choice").value;

if(choice==""){
alert("Please select your choice");
return false;
}
return true;
}
</script>
<?php



/*
$choice=$_GET["choice"];
$logged_in="";
$logged_in=$_GET["logged_in"];*/

session_start();
if(isset($_SESSION['login_admin']) && $_SESSION['login_admin']=="1234" && $_SESSION["admin_password"]=="1234"){

include('head.php');

echo "<h3>Dear ADMIN you are alredy logged in </h3>"; 
echo '<form method=get action=login_admin.php>
      <h1><b>ENTER YOUR CHOICE</b></h1>
     <br><br><input type="radio" name="choice" id="choice" value="students" ><b> REGISTERED STUDENTS<br>
     <input type="radio" name="choice" id="choice" value="new_students"><b> NEW STUDENTS<br>
     <input  type="radio" name="choice" id="choice" value="edit_students"><b>EDIT STUDENTS<br>
     <button type="submit" class="registerbtn" >SUBMIT</button>
     </form>
     

<form name="myform" action="logout_admin.php">
  <input name="aButton" type="submit" value="Logout">
</form>';
include('foot.php');
//echo "hi";
}
else {
$reg_no=$_GET["reg_no"];
$psw=$_GET["psw"];
$_SESSION['login_admin']=$reg_no;
$_SESSION['admin_password']=$psw;

if($reg_no=="1234" && $psw=="1234"){
include('head.php');

echo '<h1>YOU ARE LOGGED IN NOW</h1>
     <form method=get action=login_admin.php>
      <h1><b>ENTER YOUR CHOICE</b></h1>
     <br><br><input type="radio" name="choice" id="choice" value="students" ><b>REGISTERED STUDENTS<br>
     <input type="radio" name="choice" value="new_students"> <b>NEW STUDENTS<br>
     <input  type="radio" name="choice" value="edit_students"><b>EDIT STUDENTS<br>
     <button type="submit" class="registerbtn"  onclick="return fun()">SUBMIT</button>
     </form>
     
    

<form name="myform" action="logout_admin.php" >
  <input name="aButton" type="submit" value="Logout">
</form>';
include('foot.php');
}
else if($reg_no=="" || $psw==""){
   header("Location: login_admin_h.php");/*
   include('head.php'); 
   echo "<h1 align=center>PLEASE LOG IN TO ACCESS THE DATA</h1>";
   include('foot.php');*/
   }
 else {
   include('head.php');
   echo "<h1 align=center>THE PASSOWRD OR THE USERNAME YOU HAVE ENTERED IS INCORRECT</h1>";
   include('foot.php');
   } 
   
   
}    
