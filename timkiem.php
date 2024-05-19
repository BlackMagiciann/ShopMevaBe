<?php
include('ketnoidata.php');
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Sử dụng prepared statement để tránh SQL injection
    $sql = "SELECT * FROM qlsanpham WHERE tensp LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $searchQuery);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
                  while ($row = $result->fetch_assoc()) {
                    // Display the product ID
                      
                      echo "<div class='product-card'>";
                      $imagePath = "../images/{$row['anhsp']}";
                      echo "<img src='{$imagePath}' alt='{$row['tensp']}'>";
                      $productName = mb_strlen($row['tensp'], 'UTF-8') > 15 ? mb_substr($row['tensp'], 0, 15, 'UTF-8') . "..." : $row['tensp'];
                      echo "<h3 title='{$row['tensp']}'>" . $productName . "</h3>";
                      echo "<p>Giá: " . $row['giasp'] ." VND". "</p>";
                      echo "<a href='chitietsp.php?masp={$row['masp']}'>";
                      echo "<button class='buy-now-button'>Mua ngay</button>";
                      echo "</a>";

                      echo "</div>";
                  }
                } else {
                  echo "Không có sản phẩm nào.";
              }

    $stmt->close();
}

$conn->close();
?>
