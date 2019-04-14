<?php
$servername = "localhost";
$username = "pallabi";
$password = "password";
$dbname = "myDB";
session_start();
$name=$_SESSION['login_admin'];
$psw=$_SESSION['admin_password'];
$choice=$_GET["choice"];
$logged_in=$_GET["logged_in"];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//LIST OF ALL REGISTERED STUDENTS SHOWN
if(($name=="1234" && $psw=="1234")){
 

if($choice == "students"){
// Check nnection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from students ";
$result = $conn->query($sql);


echo '<html>
<head>

 <script src="javascript_common.js"></script> 

<link rel="stylesheet" href="login_admin.css">
</head>
<body>

<div class="header">
  <a href=""><img class=logo src="./img.png" alt=nitdgp_logo_ /></a>
  <h1>NATIONAL INSTITUTE OF TECHNOLOGY , DURGAPUR</h1>
</div>

<div class="topnav">
 
 
<form name="myform" action="admin_session.php" >
  <input name="aButton" type="submit" value="GET OUT">
</form>
</div>

<div class="row">
  <div class="column">
    
  </div>
  
  <div class="column" id="example1">
   <br>
   <br>
   <h1>REGISTERED STUDENTS </h1>

<table id ="customers">
 <tr>
  <td><b>NAME</td>
  <td><b>REGISTRATION NO<b> </td>
   <td><b>DEPT<b> </td>
    <td><b>GENDER<b> </td>
   <td><b>EMAIL<b> </td>
    <td><b>DOB<b> </td>
     <td><b>CONTACT<b> </td>
     <td><b>CORRES_ADDRESS </td>
      <td><b>PERMANENT_ADDRESS<b></td>
       <td><b>CURRENT_SEM<b> </td>
  
 </tr>';
 if ($result->num_rows > 0) {
     //<a href= department.php?edit='.$row["REGISTRATION_NO"].'><h6>EDIT</h6></a>
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr>'.
        '<td>'.$row["NAME"].'</td>'.
         '<td>'. $row["REGISTRATION_NO"].'</td>'.
          '<td>'.$row["DEPARTMENT"].'</td>'.
          '<td>'.$row["GENDER"].'</td>'.
        '<td>'. $row["EMAIL"].'</td>'.
        '<td>'. $row["DOB"].'</td>'.
       
        '<td>'.$row["CONTACT_NO"].'</td>'.
        
        '<td>'. $row["CORRES_ADDRESS"].'</td>'.
        '<td>'. $row["PER_ADDRESS"].'</td>'.
         '<td>'. $row["CURRENT_SEM"].'</td>'.
         '</tr>';
        
         }
         
 } 
 
echo ' </table>';


echo ' </table>';
echo '<h3>SEMESTER GRADES</h3>';
echo '<table id ="customers">
<tr>
<td>NAME</td>
<td>REGISTRATION_NO</td>

 <td> SEM1</td>
         <td>SEM2 </td>
          <td>SEM3 </td>
           <td>SEM4 </td>
            <td>SEM5 </td>
             <td>SEM6 </td>
              <td>SEM7 </td>
               <td>SEM8 </td>
               
    </tr>';
    $sql = "SELECT * from students ";
 $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     //echo "hi";
      echo 
         '<tr>'.
        '<td>'.$row["NAME"].'</td>'.
         '<td>'. $row["REGISTRATION_NO"].'</td>'.
       
        '<td>'. $row["SEM1"].'</td>'.
        '<td>'. $row["SEM2"].'</td>'.
        '<td>'. $row["SEM3"].'</td>'.
        '<td>'. $row["SEM4"].'</td>'.
        '<td>'. $row["SEM5"].'</td>'.
        '<td>'. $row["SEM6"].'</td>'.
        '<td>'. $row["SEM7"].'</td>'.
        '<td>'. $row["SEM8"].'</td>'.
        '</tr>';
        
         }
       }        
 
echo ' </table>';
 
echo'  </div>
  
  <div class="column">
    
  </div>
</div>

</body>
</html>';

}




//*****************************************************
//NEW STUDENTS
//*****************************************************

else if( $choice == "new_students" || $choice=="2"){


$sql = "SELECT * from new_students ";
$result = $conn->query($sql);

echo '<html>
<head>
  <script src="javascript_common.js"></script>  
 <link rel="stylesheet" href="login_admin.css">
</head> 
<body>
<div class="header">
  <a href=""><img class=logo src="./img.png" alt=nitdgp_logo_ /></a>
  <h1>NATIONAL INSTITUTE OF TECHNOLOGY , DURGAPUR</h1>
</div>

<div class="topnav">
  <a href="admin_session.php">GO OUT</a>
</div>

<div class="row">
  <div class="column">
    
  </div>
  
  <div class="column" id="example1">
   <br>
   <br>
   <h2>NEW REGISTERED STUDENTS </h2>

<table id ="customers">

 <tr>
  <td>NAME</td>
  <td>REG_NO </td>
   <td>DEPT </td>
    <td>GENDER </td>
   <td>EMAIL </td>
    <td>DOB </td>
     <td>CONTACT </td>
     <td>CORRES_ADDR </td>
      <td>PER_ADDRESS</td>
       
       <td>ACCEPT</td>
       <td>REJECT</td>
       <td>CONFIRM</td>
 </tr>';
 
 
 if ($result->num_rows > 0) {
   //  echo "ji";
    // output data of each row
    //<a href= name.php?edit='.$row["REGISTRATION_NO"].'><h6>EDIT</h6></a>
    while($row = $result->fetch_assoc()) {
          $temp=$row["REGISTRATION_NO"];
          // echo $temp;
        echo 
        '<tr>'.
        '<form method="get" action=accept_reject.php>'.
	'<td>'.$row["NAME"].'</td>'.
         '<td>'. $row["REGISTRATION_NO"].'</td>'.
          '<td>'.$row["DEPARTMENT"].'</td>'.
          '<td>'.$row["GENDER"].'</td>'.
        '<td>'. $row["EMAIL"].'</td>'.
        '<td>'. $row["DOB"].'</td>'.
       
        '<td>'.$row["CONTACT_NO"].'</td>'.
        
        '<td>'. $row["CORRES_ADDRESS"].'</td>'.
        '<td>'. $row["PER_ADDRESS"].'</td>'.
        
         '<td>  <input type=radio name=number   value="accept" /></td>'.
        '<td> <input type=radio name=number  value="reject" /></td>'.
        '<td> <input type=submit value=submit></td>'.
         '<td> <input type="hidden" name="reg_no" value='.$row["REGISTRATION_NO"].'>'.
       
        '</form>'.
         '</tr>';
	
	
        }
         
 } 
 
 
echo ' </table>';
echo '<h3>SEMESTER GRADES</h3>';
echo '<table id ="customers">
<tr>
<td>NAME</td>
<td>REGISTRATION_NO</td>
<td>CURRENT_SEM </td>
 <td> SEM1</td>
         <td>SEM2 </td>
          <td>SEM3 </td>
           <td>SEM4 </td>
            <td>SEM5 </td>
             <td>SEM6 </td>
              <td>SEM7 </td>
               <td>SEM8 </td>
               
    </tr>';
    $sql = "SELECT * from new_students ";
 $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     //echo "hi";
      echo 
         '<tr>'.
        '<td>'.$row["NAME"].'</td>'.
         '<td>'. $row["REGISTRATION_NO"].'</td>'.
         '<td>'. $row["CURRENT_SEM"].'</td>'.
        '<td>'. $row["SEM1"].'</td>'.
        '<td>'. $row["SEM2"].'</td>'.
        '<td>'. $row["SEM3"].'</td>'.
        '<td>'. $row["SEM4"].'</td>'.
        '<td>'. $row["SEM5"].'</td>'.
        '<td>'. $row["SEM6"].'</td>'.
        '<td>'. $row["SEM7"].'</td>'.
        '<td>'. $row["SEM8"].'</td>'.
        '</tr>';
        
         }
       }        
 
echo ' </table>';
echo' </div>
  
  <div class="column">
    
  </div>
</div>

</body>
 </html>';
 
 
 
/* 
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
          $temp=$row["REGISTRATION_NO"];
        echo '<form method="get" action="accept_reject.php">'.
        '<tr>'.
	'<td contenteditable=true>'.$row["NAME"].'</td>'. 
        '<td contenteditable=true>'. $row["EMAIL"].'</td>'.
        '<td contenteditable=true >'.$row["DEPARTMENT"].'</td>'.
        '<td>'. $row["REGISTRATION_NO"].'</td>'.
        '<td contenteditable=true >'.$row["GENDER"].'</td>'.
        '<td contenteditable=true>'.$row["CONTACT_NO"].'</td>'.
        '<td>  <input type=radio name=number   value="accept" /></td>'.
        '<td> <input type=radio name=number  value="reject" id ='. $temp .'/></td>'.
        '<td> <input type="text" name="reg_no" required  placeholder="id">'.
        '<td> <input type=submit value=submit></td>'.
        
         '</tr>'.
	
	'</form>';
        }
         
 } 
 echo '</table>';*/
}

else if ($choice == "edit_students"){
  require('head.php');
   echo "<html>
     <h1>ENTER THE REGISTRATION NO THE STUDENT YOU WANT TO EDIT</h1>
      <form method= get action=edit_stu_admin.php>
      <input type=text name= reg_no > <b>REGISTRATION NO:
      <input type=submit>
      </html>
    ";
   require('foot.php'); 
 }
 else {
  echo '
     <script> alert("PLEASE ENTER A CHOICE TO CONTINUE");</script>
   ';
 }
}

//$conn->close();


else {
    echo "<h1><b>The ID or the password you have entered is invalid<b></h1>";
    echo "name   ".$name."  psw  ".$psw;
}
//$conn->close();




?>
