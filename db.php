<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'student_db'; // แก้ชื่อตรงนี้

$conn = new mysqli($host, $user, $pass, $db);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตั้งค่าภาษาให้รองรับ UTF-8
$conn->set_charset("utf8");
?>