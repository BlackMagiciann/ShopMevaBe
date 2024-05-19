<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    .footer{
  margin-top: auto;
  border: 1px solid blanchedalmond;
  height: 160px;
  width: 100%;
  background-color: rgb(222, 222, 222);
  display: flex;
flex-wrap: wrap;
justify-content: space-between;
align-items: flex-start;
padding: 20px;
}
.footer-content {
display: flex;
justify-content: space-between;
width: 100%;
}

.sv {
flex: 1;
max-width: 30%; /* Điều chỉnh độ rộng của mỗi cột */
margin-right: 20px; /* Khoảng cách giữa các cột */
}

.footer-section.info {
flex: 1;
text-align: center;
}
  </style>
</head>
<body>
  <div class="footer">
    <div class="footer-content">
      <div class="sv sv1">
        <p><strong>Thành viên 1</strong></p>
        <p><strong>Họ tên:</strong> Nguyễn Trọng Minh</p>
        <p><strong>Lớp:</strong> DHTI14A12HN</p>
        <p><strong>Mã sinh viên:</strong> 20103100666</p>
      </div>
      <div class="sv sv2">
        <p><strong>Thành viên 2</strong></p>
        <p><strong>Họ tên:</strong> Nguyễn Thị Hường</p>
        <p><strong>Lớp:</strong> DHTI14A12HN</p>
        <p><strong>Mã sinh viên:</strong> 20103100794</p>
      </div>
      <div class="sv sv3">
        <p><strong>Thành viên 3</strong></p>
        <p><strong>Họ tên:</strong> Lê Anh Minh</p>
        <p><strong>Lớp:</strong> DHTI14A12HN</p>
        <p><strong>Mã sinh viên:</strong> 20103100684</p>
      </div>
      
    </div>
    <div class="footer-section info">
      <br>
      <p>&copy; NHÓM 5. SHOP CHO MẸ VÀ BÉ.</p>
    </div>
  </div>
</body>
</html>