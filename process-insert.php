<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "authors";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$userCheckQuery = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$userResult = $conn->query($userCheckQuery);

if ($userResult->num_rows > 0) {
    $name = $_POST['name'];
    $biography = $_POST['biography'];
    $birth_date = $_POST['birth_date'];
    $nationality = $_POST['nationality'];

    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["image_url"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image_url"]["tmp_name"]);
        move_uploaded_file($_FILES["image_url"]["tmp_name"], $target_file);
        if($check === false) {
            echo "File is not an image.";
            exit();
        }
    }

    $sql = "INSERT INTO authors (name, biography, birth_date, nationality, image_url) VALUES ('$name', '$biography', '$birth_date', '$nationality', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        echo "تم اضافة المؤلف بنجاح";
        echo '<a style="margin: 8px;" href="home.php" class="ctn">الصفحة الرئيسية</a>';
    } else {
        echo "خطا: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "خطأ: اسم المستخدم أو كلمة المرور غير صحيحة.";
}

$conn->close();
?>
