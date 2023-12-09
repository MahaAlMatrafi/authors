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
            margin-top: 20px;
        }

        .author-img {
            width: 300px;
            margin-bottom: 20px;
        }

        .author-info strong {
            font-weight: bold;
        }

        @media (max-width: 767px) {
            .author-img {
                width: 100%;
                max-width: 100%;
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


if(isset($_GET['author_id'])){
    $author_id = $_GET['author_id'];
    
    
    $sql = "SELECT * FROM authors WHERE author_id = $author_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <section class="author-details">
            <div class="title">
                <h1><?php echo $row['name']; ?></h1>
                <div class="line"></div>
            </div>
            <div class="author-info"><br /><br />
                <img style="width: 300px;" class="author-img" src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['name']; ?>">
                <br /><br />
                <strong>السيرة الذاتية:</strong><p> <?php echo $row['biography']; ?></p>
                <br /><br /><p><strong>تاريخ الميلاد:</strong> <?php echo $row['birth_date']; ?></p>
                <br /><br /><p><strong>الجنسية:</strong> <?php echo $row['nationality']; ?></p>
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



<section class="events">
    <div class="title">
        <h1>كُتب المؤلف</h1>
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

    
    
    $sql = "SELECT * FROM books  WHERE author_id = $author_id";
    $result = $conn->query($sql);

    
    $count = 0;
    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col" style="width:50%;">';
        echo '<div style="max-width: 100%; height: auto;">';
        echo '<a style="margin: 8px;" href="/book-details.php?book_id=' . $row['book_id'] . '" class=""> <img style="width: 300px; height: 300px;" class="book-img" src="' . $row['cover_image_url'] . '" alt="' . $row['title'] . '"></a>';
        echo '</div>';
        echo '<h4>' . $row['title'] . '</h4>';
        echo '<br />';
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