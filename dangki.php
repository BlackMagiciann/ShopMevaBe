<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="dangki.css">
    <link rel="stylesheet" href="style.css">
    <script>
        // JavaScript để hiển thị cửa sổ thông báo
        function showSuccessAlert() {
            alert("Đăng ký thành công!");
            window.location.href = 'dangnhap.php';
        }
    </script>
    <title>Register</title>
</head>
<body>
        <?php
            include('header.php');
        ?>
        <br>
    <br>
    <div class="dangki">
        <h2>Đăng Ký</h2>
        <form method="post" action="dangki.php">
            <table>
                <tr>
                    <td><label for="fullname">Họ và tên:</label></td>
                    <td><input type="text"  class="dktext" name="full_name" required></td>
                </tr>
                <tr>
                    <td><label for="username">Tên đăng nhập:</label></td>
                    <td><input type="text"  class="dktext" name="username" required></td>
                </tr>
                <tr>
                    <td><label for="password">Mật khẩu:</label></td>
                    <td><input type="password"  class="dktext" name="password" required></td>
                </tr>
                <tr>
                    <td><label for="confirm_password">Nhập lại mật khẩu:</label></td>
                    <td><input type="password"  class="dktext" name="confirm_password" required></td>
                </tr>
                <tr>
                    <td><label for="gender">Giới tính:</label></td>
                    <td>
                        <span>
                            <input type="radio" style="width:25px; margin-right: 1px;" name="gender" value="Nam" required > Nam
                            <input type="radio" style="width:25px; margin-left:25px;margin-right: 1px;" name="gender" value="Nữ" required > Nữ
                        </span>
                    </td>
                </tr>
                <tr>
                    <td><label for="birthdate">Ngày sinh:</label></td>
                    <td><input type="date" class="dktext" name="birthdate" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email"  class="dktext" name="email" required></td>
                    <td><span id="email-error" class="error-message"></span></td>
                </tr>
                <tr>
                    <td><label for="phone">Số điện thoại:</label></td>
                    <td><input type="tel" name="phone" class="dktext"  pattern="[0-9]{10}" required></td>
                    <td><span id="phone-error" class="error-message"></span></td>
                </tr>
                <tr>
                    <td><label for="address">Địa chỉ:</label></td>
                    <td><input type="text"  class="dktext" name="address" required></td>
                </tr>
            </table>
            <input type="submit" name="dangky" value="Đăng Ký"> 
        </form>
    </div>
    <br>
    <br>
    <?php
        include('footer.php');
    ?>
        <?php
    
    $host = "localhost";  // Tên máy chủ MySQL (thường là localhost)
    $username = "root";   // Tên người dùng MySQL
    $password = "";       // Mật khẩu MySQL (để trống nếu bạn không thiết lập mật khẩu)
    $database = "shopmevabe";  // Tên cơ sở dữ liệu bạn đã tạo

    $conn = new mysqli($host, $username, $password, $database);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    mysqli_set_charset($conn, 'utf8');
        if (isset($_POST['dangky'])) {
            // Lấy dữ liệu từ form
            $full_name = $_POST['full_name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $gender = $_POST['gender'];
            $birthdate = $_POST['birthdate'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            $emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
            $phoneValid = preg_match("/^\d{10}$/", $phone);
            if ($password !== $confirm_password) {
                echo "Lỗi: Mật khẩu và nhập lại mật khẩu không khớp.";
                $passwordError = "Mật khẩu và nhập lại mật khẩu không khớp.";
              }
             else if (!$emailValid) {
                    echo "Email không đúng định dạng. Vui lòng nhập email hợp lệ.<br>";
                }

              else if (!$phoneValid || !ctype_digit($phone)) {
                    echo "Số điện thoại không đúng định dạng hoặc chứa ký tự không phải số. Vui lòng nhập số điện thoại hợp lệ (10 chữ số).<br>";
                }
                else{
                    $sql = "INSERT INTO dsdangky (full_name, username,password, gender, birthdate, email, phone, address) VALUES ('$full_name', '$username', '$password', '$gender', '$birthdate', '$email', '$phone', '$address')";
                    if ($conn->query($sql) === true) {
                        echo "<script>showSuccessAlert();</script>";
                    } else {
                        echo "Lỗi: " . $sql . "<br>" . $conn->error;
                    }
                } 
        }
    ?>
</body>
</html>