<?php
   include "headerquantri.php";
   include "function_sanpham.php";
 

   $sanpham = new sanpham();
   $result_nhom= $sanpham->hienthinhom();
   if(isset($_POST['tbOk'])){
       $sanpham->masanpham = isset($_POST['masp']) ? $_POST['masp'] : '';
       $sanpham->nhomid= isset($_POST['nhom_id']) ? $_POST['nhom_id'] : 0;
       $sanpham->tensanpham = isset($_POST['tensp']) ? $_POST['tensp'] : '';
       $sanpham->mota= isset($_POST['mota']) ? $_POST['mota'] : '';
       $sanpham->dongia = isset($_POST['dongia']) ? $_POST['dongia'] : '';
       $sanpham->dongiaold = isset($_POST['dongiaold']) ? $_POST['dongiaold'] : '';
       $sanpham->soluong = isset($_POST['soluong']) ? $_POST['soluong'] : '';
       $sanpham->enable = isset($_POST['enable']) ? $_POST['enable'] : 0;
       $sanpham->ghichu = isset($_POST['ghichu']) ? $_POST['ghichu'] : '';
       $sanpham->themsanpham();
   }
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .container h2,
        label {
            color: black;
        }
    </style>
</head>

<body>

    <div class="container">
    <h2>Thêm Sản Phẩm</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="email">Nhóm Sản Phẩm:</label>
            <select class="form-control" id="nhom_id" name="nhom_id">
                <?php while ($row_nhom = mysqli_fetch_assoc($result_nhom)) { ?>
                    <option value="<?php echo $row_nhom["id"] ?>">
                        <?php echo $row_nhom["tennhom"] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="masp">Mã Sản Phẩm:</label>
            <input type="text" class="form-control" name="masp" required>
        </div>
        <div class="form-group">
            <label for="tensp">Tên Sản Phẩm:</label>
            <input type="text" class="form-control" name="tensp" required>
        </div>
        <div class="form-group">
            <label for="mota">Mô Tả:</label>
            <textarea type="text" rows="5" class="form-control" name="mota"></textarea>
        </div>
        <div class="form-group">
            <label for="dongia">Đơn Giá:</label>
            <input type="number" class="form-control" name="dongia">
        </div>
        <div class="form-group">
            <label for="dongia">Đơn Giá Cũ:</label>
            <input type="number" class="form-control" name="dongiaold">
        </div>
        <div class="form-group">
            <label for="soluong">Số Lượng:</label>
            <input type="number" class="form-control" name="soluong">
        </div>
        <div class="form-group">
            <label for="img">Ảnh Đại Diện:</label>
            <input type="file" class="form-control-file border" name="img">
       
        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="enable" value="1" checked> Hiển Thị
            </label>
        </div>
        <div class="form-group">
            <label for="ghichu">Ghi Chú:</label>
            <textarea type="text" rows="3" class="form-control" name="ghichu"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="tbOk">Chấp nhận</button>
    </form>
</div>
</body>