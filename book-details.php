<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مؤلفين عرب</title>
    <link rel="stylesheet" href="./style.css">
    <style>

        .author-details {
            text-align: right;
            padding: 20px;
        }

        .author-info {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .author-img {
            width: 300px;
            margin-right: 30px;
            margin-bottom: 20px;
        }

        .author-info .col-md-6 {
            flex: 1;
            max-width: calc(50% - 30px);
            margin-bottom: 20px;
            margin-right: 30px;
        }

        @media (max-width: 767px) {
            .author-img {
                width: 100%;
                max-width: 100%;
                margin-right: 0;
            }

            .author-info .col-md-6 {
                max-width: 100%;
                margin-right: 0;
            }
        }

    </style>
</head>
<body>
    <nav class="navbar">
        <h1 class="logo"><img width="60px" src="./img/pngwing.com.png" /></h1>
        
        <ul class="nav-links">
            <li class="active"><a href="home.php">الرئيسية</a></li>
            
            
            <li><a href="insert-author.php">اضافة مؤلف</a></li>
            <li><a href="insert-book.php">اضافة كتاب</a></li>
        </ul>
        <img src="./img/menu-btn.png" alt="" class="menu-btn" />

    </nav>

    <header>
        <div class="header-content">
            <h2> مؤلف عربي</h2>
            <div class="line"></div>
        </div>
    </header>   
    
    
    <?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "authors";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['book_id'])){
    $book_id = $_GET['book_id'];
    
    $sql = "SELECT * FROM books WHERE book_id = $book_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
            <section class="author-details">
                <div class="title">
                    <h1><?php echo $row['title']; ?></h1>
                    <div class="line"></div>
                </div>
                <div class="row author-info">
                    <div class="">
                        <img style="width: 300px;height: 300px; margin: 30px;" class="author-img" src="<?php echo $row['cover_image_url']; ?>" alt="<?php echo $row['title']; ?>">
                    </div>
                    <div class="col-md-6">
                        <strong>نبذه عن الكتاب:</strong>
                        <p><?php echo $row['description']; ?></p>
                        <br />
                        <strong>تاريخ النشر:</strong>
                        <p><?php echo $row['published_date']; ?></p>
                        <br />
                        <strong>لغة الكتاب:</strong>
                        <p><?php echo $row['language']; ?></p>
                    </div>
                </div>

            </section>
        <?php
    } else {
        echo "Author not found.";
    }
} else {
    echo "Invalid author ID.";
}

$conn->close();
?>


    <section class="footer">
        <p>حقوق الطبع محفوظة © 2023 </p>            
    </section>

    
</body>
</html>