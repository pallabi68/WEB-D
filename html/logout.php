<?php
session_start();
unset($_SESSION['login_user']);
//if(session_destroy()) // Destroying All Sessions
//{
header("Location: login_h.php"); // Redirecting To Home Page
//}
?>
