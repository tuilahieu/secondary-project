<?php

function check_admin() {
    if(!isset($_SESSION)) session_start();
    if(!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
        echo "<script>alert('Bạn không có quyền truy cập!!');window.location.href = '/';</script>";
        exit;
    }
}