 <html>
<body>
<h1>WELCOME</h1>
// define variables and set to empty values
<?php
$name = $email = $department=$registration_no= $avatar= $psw= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $department = test_input($_POST["department"]);
  $avatar = test_input($_POST["avatar"]);
  $psw = test_input($_POST["password"]);
}


 echo $name
 echo $email
 echo $departmment
 echo $psw
?>

</body>
</html>

