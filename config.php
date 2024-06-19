<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "khaledeldeyasty";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "";
} catch(PDOException $e) {
    echo "فشل الاتصال: " . $e->getMessage();
}
?>