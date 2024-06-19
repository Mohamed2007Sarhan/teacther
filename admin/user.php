<!DOCTYPE html>
<html>

<head>
    <title>User Management</title>
    <style>
        body {
            background: linear-gradient(to right, #ff9400, #ff5f6d, #ff007f);
            font-family: 'Arial', sans-serif;
            color: #fff;
            text-align: center;
            /* padding-top: 200px; */
            animation: fadeIn 2s ease-in-out;
        }

        .header {
            /* background-color: #333; */
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

        table {
            width: 100%;
            border-collapse: collapse;
            color: wheat;
        }

        table th,
        table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        /* table th {
            background-color: #f2f2f2;
        } */

        .delete-button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #d32f2f;
        }

        .edit-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .edit-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="header-logo">
            <!-- <img src="logo.png" alt="Logo"> -->
            <h1 id="nam">Admin Control Panal</h1>
        </div>
        <nav class="header-links">
            <!-- <a href="index.php" id="inde">Videos</a>
            <a href="#">Test</a> -->
            <!-- <a href="../chat/group/index.php?id=<?= $id; ?>">Admin</a> -->
            <!-- <a href="../content/index.php">Connect Us</a>
            <a href="#">Live</a> -->
        </nav>
        <div class="header-user">
            <img src="../img/OIP.jpeg" alt="User">
            <p>khaled eldeyasty</p>
        </div>
    </header>
    <h1>User Management</h1>

    <?php
    // اتصال بقاعدة البيانات
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "khaledeldeyasty";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // استعلام لاسترداد المستخدمين
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<p>Total Users: " . $result->num_rows . "</p>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Age</th><th>Status</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["UserName"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["Yers"] . "</td>";
            echo "<td>" . $row["State"] . "</td>";
            echo "<td>";

            echo "</td>";
            echo "</tr>";
    ?>

    <?php
        }
        echo "</table>";
    } else {
        echo "No users found.";
    }

    $conn->close();
    ?>
    <br>
    <hr>
    <h1>Video Management</h1>

    <?php
    // اتصال بقاعدة البيانات
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "khaledeldeyasty";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // استعلام لاسترداد الفيديوهات
    $sql = "SELECT * FROM videos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<p>Total Videos: " . $result->num_rows . "</p>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>PDF</th><th>Date</th><th>Age</th><th>tybe</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["pdf"] . "</td>";
            echo "<td>" . $row["vedeos"] . "</td>";
            echo "<td>" . $row["yer"] . "</td>";
            echo "<td>" . $row["tybe"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No videos found.";
    }

    $conn->close();
    ?>

    <center><a href="add_user.php" class="edit-button" style="width: 200px; font-weight: bold;">Add User</a></center>
    <center><a href="dl-ur.php" class="delete-button" style="width: 200px; font-weight: bold;">Delet User</a></center>
    <center><a href="../test/index.php" class="edit-button" style="width: 200px; font-weight: bold;">Make test</a></center>
    <center><a href="uploadvedio.php" class="edit-button" style="width: 200px; font-weight: bold;">Make video</a></center>
    <center><a href="dl-v.php" class="delete-button" style="width: 200px; font-weight: bold;">Delet video</a></center>
    <center><a href="https://www.mumble2.dev/lobby.html" class="edit-button" style="width: 200px; font-weight: bold;">Make live</a></center>
    <center><a href="upload-pdf.php" class="edit-button" style="width: 200px; font-weight: bold;">make pdf</a></center>
    <center>
        <footer><em>
                <p style="display: inline-block;">&copy; All rights reserved 2023</p>
            </em><span style="display: inline-block;"><a href="http://profile-muhammad-sarhan.eb2a.com/" style="text-decoration: none;">Mohammed Sarhan </a> - <em>Website Developer</em></span></footer>
    </center>
    <!-- <center><footer><em><p style="display: inline-block;">&copy; All rights reserved 2023</p></em><span style="display: inline-block;"><a href="http://profile-muhammad-sarhan.eb2a.com/" style="text-decoration: none;">Mohammed Sarhan </a> - <em>Website Developer</em></span></footer></center> -->

</body>

</html>