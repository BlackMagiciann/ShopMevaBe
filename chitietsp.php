<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color:  #FFF0F5;
    }

    .product-details-container {
        display: flex;
        max-width: 70%;
        height: 50%;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product-image {
        flex: 1;
        max-width: 30%;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    .product-info {
        flex: 1;
        padding-left: 20px;
    }

    h1,
    p {
        color: #333;
    }

    .quantity-container {
        margin-top: 10px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input {
        width: 50px;
        padding: 5px;
    }

    
    .mua-ngay-button {
        background-color: #ee4d2d;
        color: white;
        padding: 10px 20px;
        font-size: 1.2em;
        border: none;
        cursor: pointer;
        margin-top: 80px;
        margin-left: 30%;
        
    }
    .them-gio-hang-button {
        background-color: #fff;
        color: red;
        padding: 10px 20px;
        font-size: 1.2em;
        border: 2px solid red;
        cursor: pointer;
        margin-top: 80px;
        margin-left: 30px;
        
    }
    .mua-ngay-button:hover {
        background-color: #FFCC99;
    }
    .them-gio-hang-button:hover{
        background-color: #FFCC99;
    }
</style>
    
    <title>Thông Tin Sản Phẩm</title>
</head>
<body>
     <?php
        include('header.php');
     ?>

    <div class="container">
    <?php
if (isset($_GET['masp'])) {
    // Lấy masp từ tham số URL
    $product_ma = $_GET['masp'];

    include('ketnoidata.php');
    $conn->set_charset("utf8mb4");

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Truy vấn để lấy thông tin chi tiết của sản phẩm
    $sql = "SELECT * FROM qlsanpham WHERE masp = $product_ma";
    $result = $conn->query($sql);

    if ($result) {
        // Kiểm tra xem có dữ liệu trả về hay không
        if ($result->num_rows > 0) {
            // Hiển thị thông tin chi tiết của sản phẩm
            $row = $result->fetch_assoc();
            echo "<div class='product-details-container'>";
            $imagePath = "../images/{$row['anhsp']}";
            echo "<div class='product-image'>";
            echo "<img src='{$imagePath}' alt='{$row['tensp']}'>";
            echo "</div>";
            echo "<div class='product-info'>";
            echo "<h1 title='{$row['tensp']}'>" . $row['tensp'] . "</h1><br><br><br>";
            echo "<p> Mã sản phẩm: " . $row['masp'] . "</p>";
            echo "<br><br><p>{$row['mota']}</p><br><br>";
            echo "<p> Trạng thái: " . $row['trangthai'] . "</p>";
            echo "<form action='GioHang.php' method='post' onsubmit='return showSuccess()'>";
            echo "<input type='hidden' name='masp' value='{$row['masp']}'>";
            echo "<input type='hidden' name='tensp' value='{$row['tensp']}'>";
            echo "<input type='hidden' name='anhsp' value='../images/{$row['anhsp']}'>";
            echo "<input type='hidden' name='dongia' value='{$row['giasp']}'>";
            echo "<div class='quantity-container'>
                        <label for='quantity'>Số lượng:</label>
                        <input type='number' id='quantity' name='soluongmua' value='1' min='1' style ='width: 100px;'>
                    </div>";
            echo "<p> Giá bán: " . $row['giasp'] . "</p>";
            echo "<button type='submit' name='themgiohang' class='them-gio-hang-button'>Thêm vào giỏ hàng</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
    } else {
        echo "Lỗi truy vấn: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
} else {
    echo "Không có ID sản phẩm.";
}
?>


    </div>
    <?php
            include('footer.php');
    ?>
</body>
</html>