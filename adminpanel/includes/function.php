<?php

session_start();

function check_admin() {
    if(!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
        echo "<script>alert('Bạn không có quyền truy cập!!');window.location.href = '/';</script>";
        exit;
    }
}