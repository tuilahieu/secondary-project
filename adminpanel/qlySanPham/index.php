<?php
require "../includes/header.php";
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
        include "./panel.php";
        break;
    case 'add': 
        include "./add.php";
        break;
    case 'update': 
        include "./update.php";
        break;
    case 'del': 
        include "./del.php";
        break;
    case 'restore': 
        include "./restore.php";
        break;
    default:
        include __DIR__ . "/error.php";
        break;
}
} else {
    echo "Ban khong co quyen vao day :3";
}
?>