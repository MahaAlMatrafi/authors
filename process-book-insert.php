<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "authors";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("خطا في الاتصال: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$userCheckQuery = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$userResult = $conn->query($userCheckQuery);

if ($userResult->num_rows > 0) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $author_id = $_POST['author_id'];
    $published_date = $_POST['published_date'];
    $language = $_POST['language'];

    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["cover_image_url"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["cover_image_url"]["tmp_name"]);
        if($check === false) {
            echo "الملف ليس صورة.";
            exit();
        }
        move_uploaded_file($_FILES["cover_image_url"]["tmp_name"], $target_file);
    }

    $sql = "INSERT INTO books (title, description, author_id, published_date, language, cover_image_url) VALUES ('$title', '$description', '$author_id', '$published_date', '$language', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        echo "تم اضافة كتاب جديد بنجاح";
        echo '<a style="margin: 8px;" href="home.php" class="ctn">الصفحة الرئيسية</a>';
    } else {
        echo "خطا: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "خطأ: اسم المستخدم أو كلمة المرور غير صحيحة.";
}

$conn->close();
?>
