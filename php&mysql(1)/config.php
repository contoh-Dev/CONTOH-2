<?php
$server = "localhost"; 
$user   = "root"; 
$pass   = ""; 
$database= "form";

$conn = mysqli_connect ($server, $user, $pass, $database); 

if (!$conn) {
    die ("<script>alert('connection failed.')</script>"); 
}
?>