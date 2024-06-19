<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
} else {
    $id = 1;
}


session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['user_id'] = $_POST['id'];
} else {
    $_SESSION['user_id'] = 1;
}

// باقي الكود هنا
// if ($id == 'admin-control-234adj99f'){
//     header("location: admin/index.php");
// }

include "config.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "khaledeldeyasty";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE id = '$id'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $UserName = $row["UserName"];
        $State = $row["State"];
        $Yers = $row["Yers"];
    }

    if ($State == 'Active') {
        if ($Yers == '16') {
            header("Location: 1th/index.php");
            exit();
        } elseif ($Yers == '17') {
            header("Location: 2th/index.php");
            exit();
        } elseif ($Yers == '18') {
            header("Location: 3th/index.php");
            exit();
        } elseif ($id == '8bea7863-5072-11ee-88c3-ac50de047618') {
            header("Location: admin/");
            exit();
        } else {
            header("Location: Error.html");
            exit();
        }
    } else {
        header("Location: Not-Active.html");
        exit();
    }
} else {
    header("Location: Error.html");
    exit();
}

$conn->close();
?>
<!-- <center><footer><em><p style="display: inline-block;">&copy; All rights reserved 2023</p></em><span style="display: inline-block;"><a href="http://profile-muhammad-sarhan.eb2a.com/" style="text-decoration: none;">Mohammed Sarhan </a> - <em>Website Developer</em></span></footer></center> -->