<?php

if (isset($_GET['iv'])) {
    $id = $_GET['iv'];
} else {
    $id = 1; // تعيين قيمة افتراضية للمتغير إذا لم يتم تمريره في الـ URL
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "khaledeldeyasty";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM videos WHERE id = '$id'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $Name = $row["name"];
        $tybe = $row["tybe"];
        $Yers = $row["yer"];
        $vedeos = $row["vedeos"];
        $pdf = $row["pdf"];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $Name ?></title>
    <link rel="stylesheet" href="css/style1.css">
    <style>
        /* تعيين الأنماط العامة للعناصر */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            /* نسبة العرض إلى الارتفاع للفيديو (16:9) */
            margin-bottom: 20px;
        }

        .video-container video {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* تصغير الفيديو ليناسب الحاوية */
        }

        .user-profile {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .user-profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-profile h3 {
            margin: 0;
            font-size: 18px;
        }

        .video-info {
            margin-bottom: 20px;
        }

        .video-info h2 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .video-info p {
            margin: 0;
            font-size: 16px;
        }

        .comments {
            margin-bottom: 20px;
        }

        .comment {
            margin-bottom: 10px;
        }

        .comment .user-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .comment .user-name {
            font-weight: bold;
        }

        .comment .comment-text {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="header-logo">
            <!-- <img src="logo.png" alt="Logo"> -->
            <h1 id="nam">khaled eldeyasty</h1>
        </div>
        <nav class="header-links">
            <a href="index.php">Videos</a>
            <a href="#">Test</a>

            <a href="#">Live</a>
        </nav>

    </header>
    <div class="video-container">
        <video src="../admin/upload/<?= $vedeos; ?>" controls></video>
    </div>

    <div class="user-profile" dir="rtl">
        <img src="../img/1.jpg" alt="User Avatar">
        <h3>Mr / khaled eldeyasty</h3>
        <section style="float: right;">
            <a href="../admin/upload-r/<?= $pdf; ?>" download class="download-button" style="display: inline-block;background-color: #4CAF50; color: white;padding: 10px 20px; text-decoration: none; border-radius: 4px; border: none;">
                <span class="button-text">تنزيل</span>
                <span class="button-icon">&darr;</span>
            </a>
            <style>
                .download-button:hover {
                    background-color: #45a049;
                    /* تغيير لون خلفية الزر عندما يتم تمرير المؤشر عليه */
                }

                .button-text {
                    margin-right: 5px;
                    /* توضيح هامش النص داخل الزر */
                }

                .button-icon {
                    font-size: 12px;
                    /* حجم الرمز الذي يشير إلى الاتجاه */
                }
            </style>
        </section>
    </div>


    <div class="video-info">
        <center>
            <h2><?= $Name ?></h2>
        </center>
        <center>
            <p><?= $tybe; ?></p>
        </center>
    </div>


</body>

</html>