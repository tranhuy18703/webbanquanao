<?php
   include "headerquantri.php";
   include "function_tintuc.php";
 

   $tintuc = new tintuc();
   $result_nhom= $tintuc->hienthinhom();
   if(isset($_POST['tbOk'])){
       $tintuc->tentintuc = isset($_POST['tentintuc']) ? $_POST['tentintuc'] : '';
       $tintuc->nhomid= isset($_POST['nhom_id']) ? $_POST['nhom_id'] : 0;
       $tintuc->tennguoidang = isset($_POST['tennguoidang']) ? $_POST['tennguoidang'] : '';
       $tintuc->ngaydang= isset($_POST['ngaydang']) ? $_POST['ngaydang'] : '';
       $tintuc->mota = isset($_POST['mota']) ? $_POST['mota'] : '';
       $tintuc->themtintuc();
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
    <h2>Thêm Tin Tức</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="email">Nhóm tin tức:</label>
            <select class="form-control" id="nhom_id" name="nhom_id">
                <?php while ($row_nhom = mysqli_fetch_assoc($result_nhom)) { ?>
                    <option value="<?php echo $row_nhom["id"] ?>">
                        <?php echo $row_nhom["tennhom"] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="masp">Tên tin tức:</label>
            <input type="text" class="form-control" name="tentintuc" required>
        </div>
        <div class="form-group">
            <label for="tensp">Tên người đăng:</label>
            <input type="text" class="form-control" name="tennguoidang" required>
        </div>
        <div class="form-group">
            <label for="text">Ngày đăng:</label>
            <input type="text" class="form-control" name="ngaydang">
        </div>
        <div class="form-group">
            <label for="mota">Mô tả:</label>
            <textarea type="text" rows="5" class="form-control" name="mota"></textarea>
        </div>
        <div class="form-group">
            <label for="img">Ảnh đại diện:</label>
            <input type="file" class="form-control-file border" name="img">
        </div>
        <button type="submit" class="btn btn-primary" name="tbOk">Chấp nhận</button>
    </form>
</div>
</body>