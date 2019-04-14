<?php
session_start();
//$_SESSION['login_admin']="";
unset($_SESSION['login_admin']);
//if(session_destroy()) // Destroying All Sessions
//{
header("Location: login_admin_h.php"); // Redirecting To Home Page
//}
?>
