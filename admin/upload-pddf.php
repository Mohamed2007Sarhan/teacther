<?php
$pdf = $_FILES['pdf']['name'];
$id = $_POST['name'];

echo $id;
echo $pdf;
// Generate a random name for the file
$randomName = uniqid();
$targetDirectory = "upload-r/";
$extension = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);

// Set the new file name with the ".zip" extension
$newFileName = $randomName . ".zip";
$targetFileWithExtension = $targetDirectory . $newFileName;

echo $newFileName;

if (move_uploaded_file($_FILES['pdf']['tmp_name'], $targetFileWithExtension)) {
    echo "تم تحميل الملف بنجاح.";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "khaledeldeyasty";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
    }

    $sql = "UPDATE `videos` SET `pdf`='$newFileName' WHERE id = '$id';";

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