<?php
require "../includes/header.php";
include('../includes/function.php');
check_admin();
$mod = "panel";
if(isset($_GET["mod"]))
    $mod = $_GET["mod"];
    
$username = $_SESSION['username'];
$sql = "SELECT * FROM taikhoan WHERE TenDangNhap='$username'";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($query);
if ($row['Quyen'] == 1) {
switch ($mod) {
    case 'panel': 
        include "../qlyHangSX/panel.php";
        break;
    case 'add': 
        include "../qlyHangSX/add.php";
        break;
    case 'update': 
        include "../qlyHangSX/update.php";
        break;
    case 'del': 
        include "../qlyHangSX/del.php";
        break;
    case 'restore': 
        include "../qlyHangSX/restore.php";
        break;
    default:
        include "../error.php";
        break;
}
} else {
    echo "Ban khong co quyen vao day :3";
}
?>