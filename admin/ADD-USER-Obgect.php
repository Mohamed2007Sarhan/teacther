<?php
// معلومات اتصال قاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "khaledeldeyasty";

// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من نجاح الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// البيانات التي ستتم إدخالها
$name = $_POST['name'];
$age = $_POST['age'];
$status = $_POST['status'];
$email = $_POST['email'];
if ($age == '1') {
    $age = '16';
} elseif ($age == '2') {
    $age = '17';
} elseif ($age == '3') {
    $age = '18';
} else {
    header("location: user.php");
}


// استعلام SQL لإدخال البيانات في جدول
$sql = "INSERT INTO users (id, UserName, State, Yers, email) VALUES (UUID(), '$name', '$status', '$age', '$email')";

// تنفيذ الاستعلام والتحقق من نجاحه
if ($conn->query($sql) === TRUE) {
    echo "تمت إضافة العنصر بنجاح";
    header("location: user.php");
} else {
    echo "حدث خطأ أثناء إضافة العنصر: " . $conn->error;
}

// إغلاق اتصال قاعدة البيانات
$conn->close();
?>