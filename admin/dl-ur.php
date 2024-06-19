<!DOCTYPE html>
<html>
<head>
    <title>Delet User</title>
    <style>
        body {
            background: linear-gradient(to right, #ff9400, #ff5f6d, #ff007f);
            font-family: 'Arial', sans-serif;
            color: #fff;
            text-align: center;
            padding-top: 100px;
            animation: fadeIn 2s ease-in-out;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .container h2 {
            text-align: center;
        }
        .container form {
            display: flex;
            flex-direction: column;
        }
        .container form label {
            margin-bottom: 10px;
        }
        .container form input[type="file"],
        .container form input[type="text"],
        .container form input[type="number"] {
            margin-bottom: 20px;
        }
        .container form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Delet User</h2>
        <form action="dl-ur-object.php" method="post" enctype="multipart/form-data">
            <label for="name">ID:</label>
            <input type="text" id="name" name="name" required>
            <input type="submit" value="Upload">
        </form>
    </div>
    <center><footer><em><p style="display: inline-block;">&copy; All rights reserved 2023</p></em><span style="display: inline-block;"><a href="http://profile-muhammad-sarhan.eb2a.com/" style="text-decoration: none;">Mohammed Sarhan </a> - <em>Website Developer</em></span></footer></center>
<!-- <center><footer><em><p style="display: inline-block;">&copy; All rights reserved 2023</p></em><span style="display: inline-block;"><a href="http://profile-muhammad-sarhan.eb2a.com/" style="text-decoration: none;">Mohammed Sarhan </a> - <em>Website Developer</em></span></footer></center> -->
</body>
</html>