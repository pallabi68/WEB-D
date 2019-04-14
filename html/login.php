 <?php
//include('session.php');
$servername = "localhost";
$username = "pallabi";
$password = "password";
$dbname = "myDB";

session_start();
if(isset($_SESSION['login_user'])){
include('head.php');
echo "<h1>Dear ".$_SESSION['login_user']."   you are logged in </h1>"; 
echo '<br><br><a href="generate_pdf.php"><b>GENERATE PDF<b><a><br><br>';
echo '<a href= edit_stu.php?reg_no='.$_SESSION["login_user"].'><b>EDIT<b></a><br><br>';
echo ' <a href="logout.php"><b>LOGLOUT!<b></a><br><br>';
//echo '<a href=edit_stu.php?reg_no='$_SESSION['login_user']'><b>EDIT DOCUMENTS<b></a>';

include('tail.php');
}
else {
$r_no=$_GET["reg_no"];
$psw=$_GET["psw"];    
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from students where REGISTRATION_NO = '$r_no' and PASSWORD ='$psw'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
         $_SESSION['login_user']=$r_no;
           $_SESSION['psw']=$psw;
           include('head.php');
            echo "<font color=brown><h3>Dear ".$_SESSION['login_user']."   you are now logged in</h3></font>"; 
		echo '<br><br><a href="generate_pdf.php"><b>GENERATE PDF<b><a><br><br>';
		echo '<a href="edit_stu.php"><b>EDIT</a><br><br><br>'; 
		echo ' <a href="logout.php"><b>LOGLOUT!<b></a>';
           include('tail.php');		
}

else {
  if($reg_no=="" && $psw==""){
   echo "<h1 align=center>PLEASE LOG IN TO ACCESS YOUR DATA</h1>";
   }
   else {
   echo "<h1 align=center>THE PASSOWRD OR THE USERNAME YOU HAVE ENTERED IS INCORRECT</h1>";
   }
}


}

/*$pdf->SetAuthor('Jules Verne');
$pdf->PrintChapter(1,'A RUNAWAY REEF','20k_c1.txt');
$pdf->PrintChapter(2,'THE PROS AND CONS','20k_c2.txt');*/

?>



