<?php

$servername = "localhost";
$username = "pallabi";
$password = "password";
$dbname = "myDB";
$r_no=$_GET["reg_no"];
$name = "";
          $email="";
          $department="";
          $registration_no="";
          $gender= "";
          $dob="";
          $contact="";
          $corr="";
          $per="";
          $curr="";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from students where REGISTRATION_NO = '$r_no'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
          $name = $row["NAME"];
          $email=$row["EMAIL"];
          $department=$row["DEPARTMENT"];
          $registration_no=$row["REGISTRATION_NO"];
          $gender= $row["GENDER"];
          $dob=$row["DOB"];
          $contact=$row["CONTACT_NO"];
          $corr=$row["CORRES_ADDRESS"];
          $per=$row["PER_ADDRESS"];
          $curr=$row["CURRENT_SEM"];
          }
    

   
$sql = "SELECT * FROM students WHERE REGISTRATION_NO = '$r_no'";
$sth = $conn->query($sql);
$result=mysqli_fetch_array($sth);
// echo "Error: " . $sql . "<br>" . $conn->error;                      
require('head.php'); 
       
echo '         
 <html>
 <head>
 <script>
 function fun(){
 }

  function check() {
    console.log("hi");
    
  }
if(typeof(EventSource) != "undefined") {
	es = new EventSource("time.php");
	es.onmessage = function(evt) {
		document.getElementById("time").innerHTML = evt.data;
	};
} else 
document.getElementById("time").innerHTML = "Your browser does not support SSE...";

</script>
</head>
 <body onLoad=“timeId=setTimeout(check(),5)">
   
   
  
   
   
 <form method="post" action="edit.php?reg_no='.$registration_no.'">
  <a href="login.php">GO OUT<a>  
 <div align=right id="time"></div>';
  echo '<img height=150 width= 130 src="data:image/jpeg;base64,'.base64_encode( $result['IMAGE'] ).'"/>';
    
 echo '
 <input type=hidden name=reg_no value='.$registration_no.'>
 
 <table align= center><tr><td>
 <label for="name"><b>NAME :</b></label> </td>
<td> <input type="text"  name="name" id="name" value="'.$name.' "required>
 <br>
 <br>
 </td></tr>
 <tr><td>
<label for="registration_no"><b>REGISTRATION NO :</label></td>
<td> '.$registration_no.'<br><br></td></tr>
			<tr><td>		<label for="department"><b>DEPARTMENT :</b></label></td>
					<td>	<select name="department" id="department" value='.$department.'>
							<option value="IT">IT</option>
							<option value="CSE">CSE</option>
							<option value="BT">BT</option>
							<option value="ME">ME</option>
							<option value="MME">MME</option>
							<option value="ECE">CE</option>
							<option value="ECE">CVE</option>
						</select>
						<br><br></td></tr>
                                 <tr><td>              

						<label for="gender"><b>GENDER :</b></label></td>
						<pig>
				<td>		<input type="text" name="gender" value="'.$gender.'"> 
						</pig>
						<br>
						<br></td></tr>
						
				<tr><td>		<label for="email"><b>Email :</b></label></td>
	<td>		<input type="text" name="email" value="'.$email.'" required>
						<br>
						<br></td></tr> 
                                                
                        <tr><td>                   
			<label for="dob"><b>DOB :</b></label>:</td>
		<td>	 <input type="date" value='.$dob.' name="bday" id="dob" onchange="findage()">
			<br><br></td></tr>
	
		<tr><td>			<label for="contact_no"><b>CONTACT NO :</b></label></td>
			<td>			<input type="text" value='.$contact.' name="contack_no" id="contack_no" required>
						<br>
						<br> </td>
						</tr>
			<tr><td>		<label for="corres_address"><b>CORRESPONDANCE ADDRESS :</b></label></td>
				<td>		<input type=textarea name="corres_address" value="'.$corr.'" >
						<br>
						<br></td></tr>
			   <tr><td>		<label for="perm_address"><b>PERMANENT ADDRESS :</b></label></td>

				<td>		<input type=textarea name="perm_address" value="'.$per.'">
						<br>
						<br></td></tr> 
				<tr><td>	<label for="current_sem" ><b>CURRENT SEM :</b></label></td>
				<td>
						<input type="text" name="current_sem" id="current_sem" value='.$curr.' ><br><br>
						<br><br><br><br>
						</td></tr>
			
				<tr><td> 
				 <input type=submit > <b>Click to unsave the changes<b></td>
				<td><b> Save The Changes<b> <input type= submit></td></tr> 
				 <br><br><br><br>
				    
				</table>
				</form> 
				
						   
</body>
 </html>';
 mysqli_close($conn);
require('tail.php');
 
}

else {
echo "NO SUCH student exist"; 
}
 
 ?>         
