<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اضافة كتاب</title>
    <link rel="stylesheet" href="./style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }


    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <h1 class="logo"><img width="60px" src="./img/pngwing.com.png" /></h1>
            
            <ul class="nav-links">
                <li class="active"><a href="home.php">الرئيسية</a></li>
                
                
                <li><a href="insert-author.php">اضافة مؤلف</a></li>
                <li><a href="insert-book.php">اضافة كتاب</a></li>
            </ul>
            <img src="./img/menu-btn.png" alt="" class="menu-btn" />

        </nav>

        <br />
        <br />
        <br />

        <br />
        <br />
        <br />



        <form enctype="multipart/form-data" action="process-book-insert.php" method="post" novalidate>

            <label for="username">اسم المستخدم:</label>
            <input type="text" id="username" name="username" required><br>
            
            <label for="password">كلمة المرور:</label>
            <input type="password" id="password" name="password" required><br>

            <br><br>
            <div class="title">
                <h4>اضافة كتاب جديد</h4>
            </div>
            
            <label for="title">عنوان الكتاب:</label>
            <input type="text" id="title" name="title" required><br>

            <label for="description">نبذة عن الكتاب:</label>
            <textarea id="description" name="description" required></textarea><br><br>



            <label for="description"> مؤلف الكتاب :</label>
            <select id="author_id" name="author_id" required>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "admin123";
                $dbname = "authors";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT author_id , name FROM authors";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['author_id'] . '">' . $row['name'] . '</option>';
                    }
                }

                $conn->close();
                ?>
            </select><br><br>




            <label for="published_date">تاريخ النشر:</label>
            <input type="date" id="published_date" name="published_date" required><br>

            <label for="language">لغة الكتاب:</label>
            <input type="text" id="language" name="language" required><br>

            <label for="cover_image_url">صورة الغلاف:</label>
            <input type="file" id="cover_image_url" name="cover_image_url" accept="image/*" required><br>

            <button type="submit" name="submit">اضافة</button>
        </form>

    </div>
    
</body>

</html>
