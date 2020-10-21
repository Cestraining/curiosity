<?php
$servername="localhost";
$username="alex";
$password="wa";
$db="curiosity";

$conn = new mysqli($servername,$username,$password,$db);

if($conn->connect_error){
    die("connection failed");
}
?>