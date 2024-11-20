<?php


$username = $_SESSION['username'];
$sql = "SELECT * FROM taikhoan WHERE TenDangNhap='$username'";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($query);
if ($row['Quyen'] == 1) {
     ?>
     <!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        /* Cài đặt font chữ chung cho trang */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Phần header */
        #vien {
            background-color: #008744;
            color: white;
            padding: 10px;
        }

        .center {
            text-align: center;
        }

        #ban {
            font-size: 18px;
        }

        /* Phần đường dẫn */
        #ba {
            color: #ffffff;
            text-decoration: none;
        }

        #ba:hover {
            text-decoration: underline;
        }

        /* Các danh sách quản lý */
        .list {
            margin: 10px 0;
            padding: 10px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .list a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
            display: block;
        }

        .list a:hover {
            color: #008744;
        }

        /* Tạo các phần căn chỉnh cho nội dung */
        .list, #vien {
            width: 80%;
            margin: 20px auto;
        }
        a {
            color: black;
        }
    </style>
</head>
<body>
    <div id="vien"><div class="center"><div id="ban">
    <a id="ba" href="/index.php">Trang chủ</a> > 
    <font >Admin Panel</font></div></div></div>  
    <div class="list"><a href="./qlySanPham"> Quản lý sản phẩm</a></div>
    <div class="list"><a href="./qlyLoaiSP"> Quản lý loại sản phẩm</a></div>
    <div class="list"><a href="./qlyHangSX"> Quản lý thương hiệu</a></div>
    <div class="list"><a href="./qlyDonhang"> Quản lý đơn đặt hàng</a></div>
    <div class="list"><a href="./qlyTaiKhoan"> Quản lý người dùng</a></div>
    </body>
</html>

<?php

} else {
    // exit(header("Location: /"));
}
?>