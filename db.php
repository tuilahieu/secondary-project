<?php

$connection = mysqli_connect('localhost', 'root', '', 'test_db');
mysqli_query($connection, "SET NAMES 'utf8'");

if (!$connection) {
    exit('Kết nối không thành công!');
}
?>