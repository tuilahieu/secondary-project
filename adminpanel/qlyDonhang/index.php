<?php
require "../includes/header.php";
include('../includes/function.php');
check_admin();
$mod = "panel";
if(isset($_GET["mod"]))
    $mod = $_GET["mod"];

$sql = "SELECT * FROM taikhoan WHERE TenDangNhap='".$_SESSION['username']."'";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($query);
if ($row['Quyen'] == 1) {
switch ($mod) {
    case 'panel': 
        include "./panel.php";
        break;
    case 'giaohang': 
        include "./giaohang.php";
        break;
    case 'chuagiaohang': 
        include "./chuagiaohang.php";
        break;
    case 'thanhtoan': 
        include "./thanhtoan.php";
        break;
    case 'chuathanhtoan': 
        include "./chuathanhtoan.php";
        break;
    case 'huy': 
        include "./huy.php";
        break;
    case 'in': 
        include "./in.php";
        break;
    case 'chitiet': 
        include "./chitiet.php";
        break;
    case 'danggiao': 
        include "./danggiao.php";
        break;
    default:
        include "./error.php";
        break;
}
} else {
    echo "Ban khong co quyen vao day :3";
}
?>