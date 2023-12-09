<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مؤلفين العرب</title>
    <link rel="stylesheet" href="./style.css">
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
            <h2>استكشفوا الكتاب العربي</h2>
            <div class="line"></div>
            <h1>استمتعوا بأعمال أدبية رائعة</h1>
        </div>
    </header>   
    
    
    <section class="events">
        <div class="title">
            <h1>أدباء عرب</h1>
            <div class="line"></div>
        </div>

        <?php
            $servername = "localhost";
            $username = "root";
            $password = "admin123";
            $dbname = "authors";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM authors";
            $result = $conn->query($sql);

            $count = 0;
            echo '<div class="row">';
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col" style="width:100%;">';
                echo '<div style="max-width: 100%; height: auto;">';
                echo '
                <a style="margin: 8px;" href="/author-details.php?author_id=' . $row['author_id'] . '" class="">
                 
                    <img style="width: 300px;; height: 300px;" class="book-img" src="' . $row['image_url'] . '" alt="' . $row['name'] . '">
                 </a>';
                echo '</div>';
                echo '<h4>' . $row['name'] . '</h4>';
                
                echo '<div class="line"></div>';
                echo '<br />';
                echo '</div>';

                $count++;
                if ($count % 2 == 0) {
                    echo '</div><div class="row">';
                }
            }
            echo '</div>';

            $conn->close();
        ?>
</section>


    

 

    <section class="footer">
        <p>حقوق الطبع محفوظة © 2023 </p>            
    </section>

    
</body>
</html>