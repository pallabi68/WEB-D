 <?php

$servername = "localhost";
$username = "pallabi";
$password = "password";
$dbname = "myDB";
session_start();
$r_no=$_SESSION['login_user'];
$psw=$_SESSION['psw'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from students where REGISTRATION_NO = '$r_no' and PASSWORD ='$psw'";
$result = $conn->query($sql);


require('fpdf.php');

class PDF extends FPDF
{
function Header()
{
    global $title;

    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Calculate width of title and position
    $w = $this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);
    // Colors of frame, background and text
    $this->SetDrawColor(0,80,180);
    $this->SetFillColor(230,230,0);
    $this->SetTextColor(220,50,50);
    // Thickness of frame (1 mm)
    $this->SetLineWidth(1);
    // Title
    $this->Cell($w,16,$title,1,1,'C',true);
    // Line break
    $this->Ln(10);
}

function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Text color in gray
    $this->SetTextColor(128);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

function PrintChapter($name,$email, $department, $registration_no,$gender,$dob,$contact,$corr,$per,$curr,$sem1,$sem2,$sem3,$sem4,$sem5,$sem6,$sem7,$sem8,$hobby,$image)
{
   $pic = 'data://text/plain;base64,' . base64_encode($image);
// extract dimensions from image
     $info = getimagesize($pic);
    $this->AddPage();
    
    $this->SetFont('Courier','',15);
   // $this->Cell(40,10,'Hello Image!');
  // $this->Image($pic, 5, 10, $info[0]/35, $info[1]/12, 'jpg');
  // $this->Ln(6);
    $this->Image($pic, 10, 30, 35, 32, 'jpg');
    $this->SetFillColor(200,220,255);
    $this->Ln(4);$this->Ln(4);$this->Ln(24);
    $this->Cell(0,10,"NAME      $name",0,1,'L',true);
    $this->Ln(4);
    $this->Cell(0,10,"EMAIL      $email",0,1,'L',true);
    $this->Ln(4);
     $this->Cell(0,10,"DEPARTMENT      $department",0,1,'L',true);
     $this->Ln(4);
      $this->Cell(0,10,"REGISTRATION NO      $registration_no",0,1,'L',true);
      $this->Ln(4);
     $this->Cell(0,10,"GENDER      $gender",0,1,'L',true);
    $this->Ln(4); 
     $this->Cell(0,10,"DOB      $dob",0,1,'L',true);
    $this->Ln(4);  
     $this->Cell(0,10,"CONTACT NO     $contact",0,1,'L',true);
    $this->Ln(4);  
     $this->Cell(0,10,"CORRESPONDANCE  ADDRESS     $corr",0,1,'L',true);
    $this->Ln(4);  
     $this->Cell(0,10,"PERMANENET ADDRESS      $per",0,1,'L',true);
    $this->Ln(4);  
     $this->Cell(0,10,"CURRENT SEM      $curr",0,1,'L',true);
    $this->Ln(4);
     $this->Cell(0,12,"GRADES     ",0,1,'L',true);
    $this->Ln(4); 
    $this->Cell(0,6,"SEM1 - $sem1	SEM2 - $sem2	SEM3 - $sem3	SEM4 - $sem4 ",0,1,'L',true);
    $this->Ln(4);
    $this->Cell(0,6,"SEM5 - $sem5	SEM6 - $sem6	SEM7 - $sem7	SEM8 -$sem8",0,1,'L',true);
    $this->Ln(4); 
     
    
}
}

$pdf = new PDF();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
          
          $title="NATIONAL INSTITUTE OF TECHNOLOGY DURGAPUR";
          $pdf->SetTitle($title);
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
          $image=$row["IMAGE"];
          $sem1=$row["SEM1"];$sem2=$row["SEM2"];$sem3=$row["SEM3"];$sem4=$row["SEM4"];$sem5=$row["SEM5"];
          $sem6=$row["SEM6"];$sem7=$row["SEM7"]; $sem8=$row["SEM8"];
          $hobby=$row["HOBBY"];
          $pdf->PrintChapter($name,$email, $department, $registration_no,$gender,$dob,$contact,$corr,$per,$curr,$sem1,$sem2,$sem3,$sem4,$sem5,$sem6,$sem7,$sem8,$hobby,$image);
          

        
    }
    $pdf->Output();
}

else {
   echo "THE USERID OR THE PASSWORD YOU HAVE ENTERED IS NOT VALID";
   echo "    reg_no ".$reg_no."    pass".$psw;
}

/*$pdf->SetAuthor('Jules Verne');
$pdf->PrintChapter(1,'A RUNAWAY REEF','20k_c1.txt');
$pdf->PrintChapter(2,'THE PROS AND CONS','20k_c2.txt');*/

?>



