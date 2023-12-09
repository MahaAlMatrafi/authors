<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اضافة مؤلف</title>
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

    
    
        <form action="process-insert.php" method="post" enctype="multipart/form-data">
            
            <label for="username">اسم المستخدم:</label>
            <input type="text" id="username" name="username" required><br>
            
            <label for="password">كلمة المرور:</label>
            <input type="password" id="password" name="password" required><br>
            
            <div class="title">
                <h4>اضافة مؤلف جديد</h4>
            </div>
            <label for="name">اسم المؤلف:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="biography">نبذه عنه:</label>
            <textarea id="biography" name="biography" required></textarea><br>

            <label for="birth_date">تاريخ الميلاد:</label>
            <input type="date" id="birth_date" name="birth_date" required><br>

            <label for="nationality">الجنسية:</label>
            <input type="text" id="nationality" name="nationality" required><br>

            <label for="image_url">الصورة الشخصية:</label>
            <input type="file" id="image_url" name="image_url" accept="image/*" required><br>

            <button type="submit" name="submit">اضافة</button>
        </form>

    </div>
    
</body>

</html>
