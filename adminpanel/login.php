<?php
// include('./includes/header.php');

session_start();
require "../db.php";
require "../func.php";

// var_dump($_SESSION);
if (isset($_SESSION['username']) && $_SESSION['username']){
    // header('location: /adminpanel/');
    echo 'logged with user: '. $_SESSION['username'] ;
    header('location: ./');
} else {
    //Xử lý đăng nhập
if (isset($_POST['dangnhap'])) 
{
     
    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['TenDangNhap']);  
    $password = addslashes($_POST['MatKhau']);
    //Kiểm tra tên đăng nhập có tồn tại không
    $sql = "SELECT TenDangNhap, MatKhau FROM taikhoan WHERE TenDangNhap='$username' AND Quyen = 1";
$query = mysqli_query($connection, $sql);

if (!$query) {
    echo "Lỗi truy vấn: " . mysqli_error($connection);
    exit;
}

// Kiểm tra xem có kết quả không
if (mysqli_num_rows($query) === 0) {
    echo "Tài khoản sai hoặc không đủ quyền truy cập.";
    exit;
}
    $row = mysqli_fetch_array($query);
     
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['MatKhau']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    //Lưu tên đăng nhập
    $_SESSION['username'] = $username;
    ChangeURL("../index.php");
    
}
?>
<div id="vien"><div class="center"><div id="ban"><a id="ba" href="/index.php">Trang chủ</a> > <font color="#008744">Admin</font>
</div></div></div>
<div id="vien"><div class="center"><div id="ban">
    <h2>ĐĂNG NHẬP ADMIN</h2>
    <div id="ban">
        <form action='login.php?do=login' method='POST'>
                    <p>Tên đăng nhập </p>
                    <p><input id="TenDangNhap" type='text' size="50" name='TenDangNhap' /></p>
                    <p>Mật khẩu :</p>
                    <p><input id="MatKhau" type='password' name='MatKhau' /></p>
                    <p><input type='submit' name="dangnhap" value='Đăng nhập' onclick=" return Check()" />
        </form>
</div></div></div>
<script type="text/javascript">
    function Check() {
        var tendangnhap = $('#TenDangNhap').val();
        var matkhau = $('#MatKhau').val();

        if (tendangnhap == "" || matkhau == "") {
            alert("Vui lòng điền đầy đủ thông tin.");
            return false;
        }
        return true;
    }
</script>
<?php
}
?>