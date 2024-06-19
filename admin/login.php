<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استقبل بيانات تسجيل الدخول من النموذج
    $username = $_POST["username"];
    $password = $_POST["password"];

    // قم بالتحقق من صحة بيانات تسجيل الدخول
    if ($username == "admin" && $password == "12345") {
        // تم تسجيل الدخول بنجاح
        $_SESSION["username"] = $username;
        header("Location: user.php");
        exit();
    } else {
        // بيانات تسجيل الدخول غير صحيحة
        $error = "اسم المستخدم أو كلمة المرور غير صحيحة";
    }
}
?>
<!-- <center><footer><em><p style="display: inline-block;">&copy; All rights reserved 2023</p></em><span style="display: inline-block;"><a href="http://profile-muhammad-sarhan.eb2a.com/" style="text-decoration: none;">Mohammed Sarhan </a> - <em>Website Developer</em></span></footer></center> -->