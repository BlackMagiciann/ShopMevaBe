<?php
if (isset($_POST['themgiohang'])) {
    $masp = $_POST['masp'];
    $tensp = $_POST['tensp'];
    $anhsp = $_POST['anhsp'];
    $soluongmua = $_POST['soluongmua'];
    $dongia = $_POST['dongia'];

    // Thêm vào bảng giohang
    include('ketnoidata.php');
    $conn->set_charset("utf8mb4");

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    $sqlCheck = "SELECT * FROM giohang WHERE masp = $masp";
    $resultCheck = $conn->query($sqlCheck);

    if ($resultCheck) {
        if ($resultCheck->num_rows > 0) {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng
            $sqlUpdate = "UPDATE giohang SET SoLuong = SoLuong + $soluongmua WHERE masp = $masp";
            $conn->query($sqlUpdate);
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
            $sqlInsert = "INSERT INTO giohang (masp, anhsp,  tensp, SoLuong, DonGia) VALUES ($masp,  '$anhsp','$tensp', $soluongmua, $dongia)";
            $conn->query($sqlInsert);
        }
    } else {
        echo "Lỗi truy vấn: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();

    // Chuyển hướng về trang chi tiết sản phẩm
    header("Location: chitietsp.php?masp=$masp");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
    margin: 20px auto;
    max-width: 1000px;
}

h2 {
    text-align: center;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

img {
    max-width: 100%;
    height: auto;
}

/* Optional: Add some styling to make it look better */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

.container {
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    border-radius: 5px;
}

    </style>
    <title>Giỏ hàng</title>
</head>
<body>
        <?php
            include('header.php');
        ?>
    <div class="container">
        <h2>Giỏ Hàng</h2>
        <table border="1">
            <tr>
                <th>STT</th>
                
                <th>Sản Phẩm</th>
                
                <th>Số Lượng</th>
                <th>Đơn Giá</th>
                <th>Thành tiền</th>
                <th></th>
            </tr>

            <?php
            include('ketnoidata.php');
            $conn->set_charset("utf8mb4");
            
            // Kiểm tra kết nối
            if ($conn->connect_error) {
                die("Kết nối không thành công: " . $conn->connect_error);
            }
            
            // Truy vấn để lấy thông tin từ bảng giohang
            $sql = "SELECT *, SoLuong * DonGia AS thanhtien FROM giohang";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $stt = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$stt}</td>
                        
                            <td><img src='{$row['anhsp']}' alt='{$row['anhsp']}' width='50'>
                            {$row['TenSP']}</td>  
                            <td>{$row['SoLuong']}</td>
                            <td>{$row['DonGia']}</td>
                            <td>{$row['thanhtien']}</td>
                            <td>
                                <a href='javascript:void(0);' onclick='confirmDelete({$row['masp']})'>
                                    <i class='fas fa-trash-alt'></i>
                                </a>
                            </td>
                        </tr>";

                    $stt++;
                }
            } else {
                echo "<tr><td colspan='6'>Giỏ hàng trống</td></tr>";
            }
            ?>
<script>
    function confirmDelete(masp) {
        var confirmDelete = confirm("Bạn có chắc chắn muốn xóa sản phẩm khỏi giỏ hàng không?");
        if (confirmDelete) {
            window.location.href = 'xoagiohang.php?masp=' + masp;
        }
    }
</script>
        </table>
    </div>
      <?php
            include('footer.php');
        ?>
</body>
</html>