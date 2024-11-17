<?php include "headerquantri.php";
include "function_tintuc.php";
$nhomtintuc = new nhomtintuc();
if(isset($_POST['tbOk'])){
    $nhomtintuc->id=isset($_POST['id']) ? $_POST['id'] : '';
    $nhomtintuc->tennhom=isset($_POST['tennhom']) ? $_POST['tennhom'] : '';
    $nhomtintuc->ghichu=isset($_POST['ghichu']) ? $_POST['ghichu'] : '';
   
    $nhomtintuc->insert();

   
}
?>
<div class="container" >
    <h2>Thêm Tin Tức Nhóm</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="tensp">Mã Nhóm:</label>
            <input type="text" class="form-control" id="id" name="id" required>
        </div>
        <div class="form-group">
            <label for="tensp">Tên Nhóm:</label>
            <input type="text" class="form-control"  name="tennhom" required>
        </div>
        <div class="form-group">
            <label for="soluong">Ghi Chú:</label>
            <input type="text" class="form-control" name="ghichu" >
        </div>
       
<button type="submit" class="btn btn-primary" name="tbOk">Chấp nhận</button>
    </form>
</div>