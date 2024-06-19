<?php
$id = $_POST['name'];
echo $id;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "khaledeldeyasty";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

$sql = "DELETE FROM `users` WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "تمت إضافة العنصر بنجاح.";
    header("location: user.php");
    exit;
} else {
    echo "حدث خطأ أثناء إضافة العنصر: " . $conn->error;
}
