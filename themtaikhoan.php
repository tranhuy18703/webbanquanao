<?php include "headerquantri.php";
include "function_taikhoan.php";
$taikhoan = new taikhoan();
if(isset($_POST['tbOk'])){
   $taikhoan->tendangnhap=isset($_POST['tendangnhap']) ? $_POST['tendangnhap'] : '';
   $taikhoan->matkhau=isset($_POST['matkhau']) ? $_POST['matkhau'] : '';
   $taikhoan->hoten=isset($_POST['hoten']) ? $_POST['hoten'] : '';
   $taikhoan->email=isset($_POST['email']) ? $_POST['email'] : '';
   $taikhoan->enable=isset($_POST['enable']) ? $_POST['enable'] : 0 ;
   $taikhoan->insert();
}
?>

<div class="container" >
    <h2>Thêm Tài Khoản</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="email">Tên đăng nhập:</label>
            <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" required>
        </div>
        <div class="form-group">
            <label for="pwd">Mật khẩu:</label>
            <input type="password" class="form-control"  name="matkhau" required>
        </div>
        <div class="form-group">
            <label for="email">Họ tên:</label>
            <input type="text" class="form-control" name="hoten" >
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" >
        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="enable" checked> Kích hoạt </label>
        </div>
        <button type="submit" class="btn btn-primary" name="tbOk">Chấp nhận</button>
    </form>
</div>

