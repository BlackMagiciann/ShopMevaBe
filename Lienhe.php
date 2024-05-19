<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Lienhe.css">
    <title>Góp ý</title>
</head>
<body>
    
        <?php
            include('header.php');
        ?>
    <div class="Gopy">
            <form action="" method="post" class="formgopy">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">HỘP THƯ GÓP Ý</th>
                        </tr>                   
                    </thead>
                    <tbody>
                        <tr>
                            <td>Họ tên</td>
                            <td>
                                <label for="hoten"></label>
                                <input type="text" class="gopy" name="hoTen" id="">
                            </td>
                        </tr>
                        <tr>
                            <td>Góp ý về lĩnh vực</td>
                            <td>
                                <input type="checkbox" class="inputgopy" name="linhVuc"  value="Dịch vụ" id="">Dịch vụ
                                <input type="checkbox" class="inputgopy" name="linhVuc" value="Sản phẩm" id="">Sản phẩm
                                <input type="checkbox" class="inputgopy" name="linhVuc" value="Loại khác" id="">Loại khác
                            </td>
                        </tr>
                        <tr>
                            <td>Ngôn ngữ</td>
                            <td>
                            <input type="radio" class="inputgopy" name="ngonNgu" id="" value="Anh">Anh
                            <input type="radio" class="inputgopy" name="ngonNgu" id="" value="Việt">Việt
                            </td>
                        </tr>
                        <tr>
                            <td>Nội dung</td>
                            <td>
                                <textarea name="noiDung" class="inputgopy" id="" cols="30" rows="3"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="gui" id="gui" value="Gửi">
                                <input type="submit" name="xoa" id="gui" value="Xóa">
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <?php
            include('footer.php');
        ?>
</body>
</html>