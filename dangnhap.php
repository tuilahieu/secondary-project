<?php
include('header.php');
if (isset($_SESSION['username']) && $_SESSION['username']){
    if(isset($_SESSION['is_admin']) &&  $_SESSION['is_admin']) {
        echo "<script>window.location.href = './adminpanel';</script>";
        exit;
    }
    echo "<script>window.location.href = './';</script>";
    exit;
    
    
} else {
    //Xử lý đăng nhập
if (isset($_POST['dangnhap'])) 
{
     
    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['TenDangNhap']);
    $password = addslashes($_POST['MatKhau']);
    //Kiểm tra tên đăng nhập có tồn tại không
    $sql = "SELECT TenDangNhap, MatKhau, Quyen FROM taikhoan WHERE TenDangNhap='$username'";
    $query = mysqli_query($connection, $sql);
    if ($query == NULL) 
    {        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    //Lấy mật khẩu trong database ra
    $row = mysqli_fetch_array($query);
    $is_admin = $row['Quyen'];
     
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['MatKhau']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    //Lưu tên đăng nhập
    $_SESSION['username'] = $username;
    $_SESSION['is_admin'] =  $is_admin;
    ChangeURL("../index.php");
    
    
}
?>
<div id="vien"><div class="center"><div id="ban"><a id="ba" href="/index.php">Trang chủ</a> > <font color="#008744">Đăng nhập tài khoản</font>
</div></div></div>
<div id="vien"><div class="center"><div id="ban">
    <h2>ĐĂNG NHẬP TÀI KHOẢN</h2>
    <p>Nếu đã có tài khoản, đăng nhập tại đây</p></div>
    <div id="ban">
        <form action='/dangnhap.php?do=login' method='POST'>
                    <p>Tên đăng nhập </p>
                    <p><input id="TenDangNhap" type='text' size="50" name='TenDangNhap' /></p>
                    <p>Mật khẩu :</p>
                    <p><input id="MatKhau" type='password' name='MatKhau' /></p>
                    <p><input type='submit' name="dangnhap" value='Đăng nhập' onclick=" return Check()" />
                    <a href='dangky.php' title='Đăng ký'>Đăng ký</a></p>
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