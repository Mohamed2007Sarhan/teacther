<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
    <style>
        body {
            background: linear-gradient(to right, #ff9400, #ff5f6d, #ff007f);
            font-family: 'Arial', sans-serif;
            color: #fff;
            text-align: center;
            padding-top: 200px;
            animation: fadeIn 2s ease-in-out;
        }
        .profile {
            /* background-color: #f0f0f0; */
            padding: 20px;
            border-radius: 5px;
        }

        .profile-item {
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="file"] {
            width: 100%;
            padding: 5px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        img {
            max-width: 200px;
            border-radius: 50%;
            display: none;
        }

        .submit-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
        }

        /* تنسيق الأنماط */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .profile-item {
            animation: fadeIn 1s ease-in-out;
        }

        .submit-button {
            transition: background-color 0.3s ease-in-out;
        }

        .submit-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <form action="ADD-USER-Obgect.php" method="post">
        <div class="profile">
            <div class="profile-item">
                <label for="name">الاسم:</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="profile-item">
                <label for="age">السن:</label>
                <input type="text" id="age" name="age">
            </div>
            <div class="profile-item">
                <label for="status">الحالة:</label>
                <input type="text" id="status" name="status">
            </div>
            <div class="profile-item">
                <label for="image">الصورة:</label>
                <input type="file" id="image" accept="image/*">
                <img id="preview" src="#" alt="صورة الشخص">
            </div>
            <div class="profile-item">
                <label for="email">البريد الإلكتروني:</label>
                <input type="email" id="email" name="email">
            </div>
            <button class="submit-button">إرسال</button>
        </div>
    </form>
    <script>
        // تحديث الصورة المعاينة عند اختيار ملف صورة
        const imageInput = document.getElementById('image');
        const previewImage = document.getElementById('preview');

        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };

            reader.readAsDataURL(file);
        });
    </script>
    
</body>

</html>