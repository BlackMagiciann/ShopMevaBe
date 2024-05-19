
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Shop Mẹ và bé</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="wrapper">
    <?php
      include('header.php');
    ?>
      <div class="main">
          <div class="sidebar">
            <ul class="custom-list">
            <h3 class="category-title">
              <i class="fas fa-bars"></i>DANH MỤC SẢN PHẨM</h3>
              <li><a href="home.php?maloai=SUA">Sữa & Bình sữa</a></li>
              <li><a href="home.php?maloai=BT">Bỉm tã - Vệ sinh</a></li>
              <li><a href="home.php?maloai=TT">Thời trang cho bé</a></li>
              <li><a href="home.php?maloai=DC">Đồ chơi cho bé</a></li>
              <li><a href="home.php?maloai=MOM">Đồ cho mẹ</a></li>
              <li><a href="home.php?maloai=GD">Đồ dùng gia đình</a></li>
            </ul>
          </div>
          <div class="maincontent">
          
          <?php
              include('ketnoidata.php');
              $conn->set_charset("utf8mb4");
              $result = $conn->query("SELECT masp, tensp, anhsp,giasp FROM qlsanpham ");
              
              if ($result === false) {
                echo "Lỗi truy vấn SQL: " . $conn->error;
              } else {
              
                $numRows = $result->num_rows;
                
                if ($numRows > 0) {
                  echo "<h2>Tất cả sản phẩm<span style='font-size: 0.8em;color: gray;margin-left: 10px;'> ($numRows sản phẩm)</span></h2>";
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
            }
              $conn->close();
            ?>
            
          </div>
      </div>
      <div class="clear"></div>
      <?php
        include('footer.php');
      ?>
    </div>
</body>
</html>