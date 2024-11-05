<?php
require "../includes/header.php";
require "../includes/function.php";

check_admin();

$mod = "list";
if(isset($_GET["mod"]))
    $mod = $_GET["mod"];
    
$username = $_SESSION['username'];
$sql = "SELECT * FROM taikhoan WHERE TenDangNhap='$username'";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($query);
if ($row['Quyen'] == 1) {
switch ($mod) {
    case 'list': 
        include "./list.php";
        break;
    case 'cam': 
        include "./cam.php";
        break;
    case 'khoiphuc': 
        include "./khoiphuc.php";
        break;
    default:
        include "./error.php";
        break;
}
} else {
    echo "Ban khong co quyen vao day :3";
}
?>