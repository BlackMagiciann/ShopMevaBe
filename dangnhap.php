<?php
session_start();

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "shopmevabe";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

mysqli_set_charset($conn, 'utf8');

if (isset($_POST['dangnhap'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM dsdangky WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Đăng nhập thành công
        $_SESSION['username'] = $username;
        header("Location: index.php"); // Chuyển hướng đến trang index
        exit();
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dangnhap.css">
    <title>Login</title>
    

</head>
<body>
    <div class="wrapper">
      <?php
        include('header.php');
      ?>
    <br>
    <br>
    <div class="dangnhap">
        <h2>Đăng nhập</h2>
        <?php
            if (isset($error)) {
                echo "<p style='color: red; font-weight: bold;'>".$error."</p>";
            }
            ?>
        <form  method="post">
            <label for="username">Username:</label>
            <input type="text" id="username"  class="textform" name="username" required>

            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" class="textform" name="password" required>

            <input type="submit" name="dangnhap" value="Đăng nhập">

            <p class="forgot-password"><a href="quen_mat_khau.php">Quên mật khẩu</a></p>

            <p class="register">Chưa có tài khoản?<a href="dangki.php">Đăng kí</a></p>
        </form>
    </div>
    <br>
    <br>
    <?php
        include('footer.php');
    ?>
</body>
</html>
