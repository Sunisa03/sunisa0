<?php
$host = "localhost";
$user = "root";
$pwd = "66010914005"; 
$db = "4020db";

$conn = mysqli_connect($host, $user, $pwd, $db) or die ("เชื่อมต่อฐานข้อมูลล้มเหลว");
mysqli_query($conn, "SET NAMES utf8");
?>