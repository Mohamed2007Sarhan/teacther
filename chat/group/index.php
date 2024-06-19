<style>
    textarea {
        width: 100%;
        height: 100px;
        resize: none;
    }
</style>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 1; // تعيين قيمة افتراضية للمتغير إذا لم يتم تمريره في الـ URL
}

//echo $id;
?>
<?php
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
        
    } else {
        header("Location: ../Not-Active.html");
        exit();
    }
} else {
    header("Location: ../login.php");
}
?>



<?php


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


while ($row = $result->fetch_assoc()) {

    $nameuser = $row["UserName"];
};




?>


<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Mr / khaled eldeyasty {1}</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function aj() {
            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById('chat').innerHTML = req.responseText;
                }
            }
            req.open('GET', 'chat.php', true);
            req.send();
        }
        setInterval(function() {
            aj()
        }, 1000);
    </script>
    <link rel="icon" href="../image/logo3.png">
</head>

<body onload="aj();">
    <p style="color: whitesmoke; font-weight: bold;">welcome sir <?= $nameuser; ?> in group chat</p>
    <div id="container">
        <div id="chatbox">
            <div id="chat">
            </div>
        </div>
        <form action="<?= "index.php?id=" . $id ?>" method="post">
            <textarea name="msg" placeholder="your msg"></textarea>
            <input type="submit" name="submit" value="Send">
        </form>
        <?php
        if (isset($_POST['submit'])) {

            $m = $_POST['msg'];

            $insert = "insert into chat (name,msg) values('$nameuser','$m')";
            $run_insert = mysqli_query($con, $insert);
            if ($run_insert) {
                echo '<embed loop="false" hidden="true" src="" autoplay="true"';
            }
            header('location: index.php?id=' . $id);
        }

        ?>
    </div>
</body>

</html>
<!-- <div class="link"><p>The site was built by <span style="font-weight: bold; color: blue;"><a href="http://profile-muhammad-sarhan.eb2a.com/" style="font-weight: bold; color: blue;">Hamed Sarhan</a></span></p></div> -->
<center><footer><em><p style="display: inline-block;">&copy; All rights reserved 2023</p></em><span style="display: inline-block;"><a href="http://profile-muhammad-sarhan.eb2a.com/" style="text-decoration: none;">Mohammed Sarhan </a> - <em>Website Developer</em></span></footer></center>
<!-- <center><footer><em><p style="display: inline-block;">&copy; All rights reserved 2023</p></em><span style="display: inline-block;"><a href="http://profile-muhammad-sarhan.eb2a.com/" style="text-decoration: none;">Mohammed Sarhan </a> - <em>Website Developer</em></span></footer></center> -->