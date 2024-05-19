<?php
session_start();

if (isset($_GET['masp'])) {
    $masp = $_GET['masp'];

    // Thực hiện kết nối đến cơ sở dữ liệu
    include('ketnoidata.php');
    $conn->set_charset("utf8mb4");

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Thực hiện truy vấn xóa sản phẩm từ bảng giohang
    $sql = "DELETE FROM giohang WHERE masp = $masp";
    if ($conn->query($sql) === TRUE) {
        echo "Xóa sản phẩm thành công";
    } else {
        echo "Lỗi khi xóa sản phẩm: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();

    // Chuyển hướng trở lại trang giỏ hàng
    header("Location: GioHang.php");
    exit();
} else {
    echo "Không có mã sản phẩm để xóa.";
}
?>