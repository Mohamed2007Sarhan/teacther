
<?php
include "scurety.php";
?>
<?php


session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['user_id'] = $_POST['id'];
} else {
    $_SESSION['user_id'] = 1;
}

header("location: welcome.html")
?>