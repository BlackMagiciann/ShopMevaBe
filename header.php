<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Shop Mẹ và bé</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
  .menu-2 {
    margin-top: 20px; 
    display: flex;
    flex-direction: column;
    align-items: center;/* Khoảng cách giữa menu và menu 2 */
    
  }

  .listmenu {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    font-size: 20px;
    
  }

  .listmenu li {
    margin-right: 15px;
    
  }

  .listmenu a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
    
  }

  /* Hover effect */
  .listmenu a:hover {
    color: #ff6600;
  }
</style>
</head>
<body>
    <div class="wrapper">
      <div class="header">
      </div>
      <div class="menu">
        <a href="index.php"><h1>SHOP MẸ VÀ BÉ</h1></a>
        <ul class="listmenu">
          <li class="search-form">
            <form action="" method="get">
              <input type="text" name="query" id="search-input" style="outline: none;box-shadow: none;" placeholder="Tìm kiếm...">
              <button type="submit" id="search-button">
                <i class="fa fa-search"></i>
            </button></li>
            <li><span style="margin-right:3px;" class="icon-text"><i class="fas fa-shopping-cart"></i></span>
                <span style="margin-right:20px;"><a href="GioHang.php">Giỏ hàng</a></span>
                <span style="margin-right:3px;" class="icon-text"><i class="fas fa-user"></i></span>
                <span><?php
                        
                        if (isset($_SESSION['username'])) {
                            echo "Chào mừng, " . $_SESSION['username'] . " | <a href='logout.php'>Đăng xuất</a>";
                        } else {
                            echo "<a href='dangnhap.php'>Đăng nhập</a> | <a href='dangki.php'>Đăng kí</a>";
                        }
                        ?></span>
            </li>
            <li><i class="fas fa-pen" style="margin-right:5px;"></i><a href="Lienhe.php">Liên hệ</a></li>
        </ul>
      </div>
      <div class="menu-2">
        <ul class="listmenu">
          <li><a href="index.php">TRANG CHỦ</a></li>
          <li><a href="home.php">CỬA HÀNG</a></li>
          <li><a href="lienhe.php">LIÊN HỆ</a></li>
         
        </ul>
      </div>
    </div>
</body>
</html>
