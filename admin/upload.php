<?php
$video = $_FILES['video']['name'];
$name = $_POST['name'];
$description = $_POST['description'];
$age = $_POST['age'];

// Generate a random name for the file
$randomName = uniqid();
$targetDirectory = "upload/";
$extension = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);

// Set the new file name with the ".mp4" extension
$newFileName = $randomName . ".mp4";
$targetFileWithExtension = $targetDirectory . $newFileName;

echo $newFileName;
echo "<br>";
echo $targetFileWithExtension;
echo "<br>";
echo $name;
echo "<br>";
echo $description;
echo "<br>";
echo $age;

if (move_uploaded_file($_FILES['video']['tmp_name'], $targetFileWithExtension)) {
    echo "تم تحميل الملف بنجاح.";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "khaledeldeyasty";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
    }

    $sql = "INSERT INTO videos (id, name, tybe, yer, vedeos) VALUES (UUID(), '$name', '$description', '$age', '$newFileName')";

    if ($conn->query($sql) === TRUE) {
        echo "تمت إضافة العنصر بنجاح.";
        header("location: user.php");
        exit;
    } else {
        echo "حدث خطأ أثناء إضافة العنصر: " . $conn->error;
    }
} else {
    echo "عذرًا، حدث خطأ أثناء تحميل الملف.";
}
?>