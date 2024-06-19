<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    // استخدم القيمة المحفوظة في $id كما تحتاج هنا
} else {
    $id = 1;
}

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
        } elseif ($Yers == '17') {
            header("Location: ../2th/index.php");
            exit();
        } elseif ($Yers == '18') {
            header("Location: ../3th/index.php");
            exit();
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
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/swiper-bundle.min.css">
<title>Home Mr / khaled eldeyasty {chat}</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    body {
        background: linear-gradient(to right, #ff9400, #ff5f6d, #ff007f);
        font-family: 'Arial', sans-serif;
        
        animation: fadeIn 2s ease-in-out;
    }

    .header {
        background-color: #333;
        color: #fff;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .header-logo {
        display: flex;
        align-items: center;
    }

    .header-logo img {
        width: 40px;
        height: 40px;
        margin-right: 10px;
    }

    .header-logo h1 {
        margin: 0;
        font-size: 20px;
    }

    .header-links {
        display: flex;
    }

    .header-links a {
        color: #fff;
        text-decoration: none;
        margin-right: 20px;
        font-size: 16px;
        position: relative;
        /* تحديد العنصر بوضعية نسبية لتطبيق الحركة */
    }

    .header-links a::after {
        content: '';
        position: absolute;
        bottom: -10px;
        /* تحديد المسافة من الأسفل */
        left: 0;
        width: 0;
        height: 3px;
        background-color: blue;
        transition: width 0.4s ease-in-out;
        /* تحديد سرعة الانتقال ونمط التسريع التدريجي */

    }

    .header-links a:hover::after {
        width: 100%;
        /* جعل الخط يمتد بالكامل */
        height: 3px;
    }

    .header-user {
        display: flex;
        align-items: center;
    }

    .header-user img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .header-user p {
        margin: 0;
        font-size: 16px;
    }

    #nam:hover {
        color: blue;
    }

    #inde {
        color: blue;
    }
</style>
<?php
if ($Yers == '16') {
    $path = '1th';
} elseif ($Yers == '17') {
    $path = '2th';
} elseif ($Yers == '18') {
    $path = '3th';
}
?>
<header class="header">
    <div class="header-logo">
        <!-- <img src="logo.png" alt="Logo"> -->
        <h1 id="nam">khaled eldeyasty</h1>
    </div>
    <nav class="header-links">
        <a href="../<?= $path; ?>/index.php">Videos</a>
        <a href="#">Test</a>
        <a href="../chat/group/index.php?id=<?= $id; ?>">Chat</a>
        <a href="../content/index.php" id="inde">Connect Us</a>
    </nav>
    <div class="header-user">
        <img src="../img/OIP.jpeg" alt="User">
        <p><?= $UserName; ?></p>
    </div>
</header>
<section class="contact section" id="contact">
    <h2 class="section__title">Contact Me</h2>
    <span class="section__subtitle">My inbox is always open. Whether you have a question or just want to say hi,
        I’ll try my best to get back to you!</span>

    <div class="contact__container container grid">
        <div>
            <!-- <div class="contact__information">
                            <i class="uil uil-phone contact__icon"></i>
                            <div>
                                <h3 class="contact__title">Call Me </h3>
                                <span class="contact__subtitle"></span>
                            </div>
                        </div> -->
            <div class="contact__information">
                <i class="uil uil-envelope contact__icon"></i>
                <div>
                    <h3 class="contact__title">Email</h3>
                    <span class="contact__subtitle">khaledeldeyasty@gmail.com</span>
                </div>
            </div>




            <div class="contact__information">
                <i class="uil uil-map-marker contact__icon"></i>
                <div>
                    <h3 class="contact__title">Location</h3>
                    <span class="contact__subtitle">Egypt , New Damietta</span>
                </div>
            </div>
        </div>
        <form method="POST" action="https://formspree.io/f/xoqovyka" class="contact__form grid">

            <div class="contact__inputs grid">
                <div class="contact__content">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required class="contact__input" />
                </div>
                <div class="contact__content">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required class="contact__input" />
                </div>
            </div>
            <div class="contact__content">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="4" required class="contact__input"></textarea>
            </div>

            <div class="actions">
                <button type="submit" class="contact__submit">
                    Send Message
                    <i class="uil uil-message button__icon"></i>
                </button>
            </div>
        </form>

    </div>
</section>
<center><footer><em><p style="display: inline-block;">&copy; All rights reserved 2023</p></em><span style="display: inline-block;"><a href="http://profile-muhammad-sarhan.eb2a.com/" style="text-decoration: none;">Mohammed Sarhan </a> - <em>Website Developer</em></span></footer></center>
<!-- <center><footer><em><p style="display: inline-block;">&copy; All rights reserved 2023</p></em><span style="display: inline-block;"><a href="http://profile-muhammad-sarhan.eb2a.com/" style="text-decoration: none;">Mohammed Sarhan </a> - <em>Website Developer</em></span></footer></center> -->
<script src="main.js"></script>
<script src="swiper-bundle.min.js"></script>