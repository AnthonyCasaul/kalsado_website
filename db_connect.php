<?php 
$server = "localhost";
$user = "root";
$pass = "";
$database = "kalsado_website";
$conn = new Mysqli($server, $user, $pass, $database);
if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
?>
