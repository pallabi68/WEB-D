 <html>
<body>



<?php

$servername = "localhost";
$username = "pallabi";
$password = "password";
$dbname = "myDB";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
$name=$_POST["name"]; 
$reg_no=$_POST["registration_no"]; 
$department=$_POST["department"];
$gender=$_POST["gender"] ;
 $email=$_POST["email"] ;
$dob=$_POST["bday"];
$contact_no=$_POST["contack_no"];
$corres_address=$_POST["corres_address"];
$perm_address=$_POST["perm_address"];
$curr_sem=$_POST["current_sem"];
$sem1=$_POST["sem1"];
$sem2=$_POST["sem2"];
$sem3=$_POST["sem3"];
$sem4=$_POST["sem4"];
$sem5=$_POST["sem5"];
$sem6=$_POST["sem6"];
$sem7=$_POST["sem7"];
$sem8=$_POST["sem8"];
$password=$_POST["password"];



$file = $_FILES['image']['tmp_name'];

if (!isset($file))
  echo "Please select a profile pic";
else
{
  $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
  $image_name = addslashes($FILES['image']['name']);
  $image_size = getimagesize($_FILES['image']['tmp_name']);

  if ($image_size==FALSE)
    echo "That isn't a image.";
  else
  {
     echo "correct";
    //$insert = mysql_query("INSERT INTO content VALUES ('','','','','','','','','','$image_name','$image',)");
  }
}



$sql=$sql = "SELECT * from students where REGISTRATION_NO = '$reg_no'";
if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  if($rowcount>0){
   echo "<h1><b>SORRY</b> THIS REGISTRATION NUMBER IS  ALREADY REGISTERED </h1>"; 
  }
  
else {
echo "hi";
$msg = "YOUR REGISTRATION REQUEST HAS BEEN RECORDED \n THANK YOU";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("pallabimondal68@gmail.com","NITDRegistrationRequest",$msg);
echo "<h1>YOU HAVE SUCCESFULLY SUBMITTED REGISTRATION  REQUEST </h1>";
$hobby="";
/*
,,,,,, VARCHAR(256),,VARCHAR(23),,,,IMAGE_NAME VARCHAR(256));
*/
$sql="insert into new_students values('$name','$reg_no','$department','$gender','$email','$dob','$contact_no','$corres_address',
'$perm_address','$curr_sem','$sem1','$sem2','$sem3','$sem4','$sem5','$sem6','$sem7','$sem8','$password','$hobby','$image_name','$image')";
$res = $conn->query($sql); 
         if ($conn->query($sql) === TRUE) {
           echo "New record created successfully";
         } 
         else {
        // echo "error occured";
       echo "Error: " . $sql . "<br>" . $conn->error;
         }
       //   header("Location: home.html");*/
      // include('head.php');
   echo'    <h3> In case you are deregistered you will be notified in your email adress </h3>
        <h5>            Thank You </h5>';
        
     //  include('tail.php');
       
       $sql = "SELECT * FROM new_students WHERE REGISTRATION_NO = $reg_no";
     $sth = $conn->query($sql);
    $result=mysqli_fetch_array($sth);
    echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['IMAGE'] ).'"/>';
       
 }   
}


?>


