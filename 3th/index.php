<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    // استخدم القيمة المحفوظة في $id كما تحتاج هنا
} else {
    $id = 1;
}
// echo $id;
include "../config.php";

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
        $photo = $row["photo"];
    }

    if ($State == 'Active') {
        if ($Yers == '16') {
            header("Location: ../1th/index.php");
            exit();
        } elseif ($Yers == '17') {
            header("Location: ../2th/index.php");
            exit();
        } elseif ($Yers == '18') {
            
        } else {
            header("Location: ../Error.html");
            exit();
        }
    } else {
        header("Location: ../Not-Active.html");
        exit();
    }
} else {
    header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home Mr / khaled eldeyasty {3}</title>
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    <header class="header">
        <div class="header-logo">
            <!-- <img src="logo.png" alt="Logo"> -->
            <h1 id="nam">khaled eldeyasty</h1>
        </div>
        <nav class="header-links">
            <a href="index.php" id="inde">Videos</a>
            <a href="#">Test</a>
            <a href="../chat/group/index.php?id=<?= $id; ?>">Chat</a>
            <a href="../content/index.php">Connect Us</a>
            <a href="#">Live</a>
        </nav>
        <div class="header-user">
            <img src="../img/OIP.jpeg" alt="User">
            <p><?= $UserName; ?></p>
        </div>
    </header>
    <section dir="ltr">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "khaledeldeyasty";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM videos WHERE yer = '$Yers'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $idvedios2 = $row['id'];
                $name = $row["name"];
                $tybe = $row["tybe"];
                $vedeos = $row["vedeos"];
                $test_id = $row["test_id"];
                $home_work_id = $row["home_work_id"];
                $pdf = $row["pdf"];
                $img_ad = $row["img_ad"];
                $Name_ad = $row["Name_ad"];
        ?>
                <a href="show-vedios.php?iv=<?= $idvedios2; ?>" style="text-decoration: none; color: #000;" >
                    <video src="../admin/upload/<?= $vedeos; ?>" id="vedio_charh"></video>
                    <span id="namevedios">
                        <p><?= $name; ?></p>
                    </span>
                    <span id="discription" style="text-decoration: none;">
                        <p><?= $tybe; ?></p>
                    </span>
                </a>
        <?php
            }
        } else {
            header("Location: ../login.php");
        }
        ?>

    </section>
</body>

</html>