<?php include "headerquantri.php";?>
    <?php
    include "function.php";
    $nhomsanpham = new nhomsanpham();
    $id = $_GET['id'];
    $result = $nhomsanpham->hienthiid($id);
    $row = mysqli_fetch_array($result);
    if(isset($_POST['ok'])){
            $nhomsanpham->id=isset($_POST['id']) ? $_POST['id'] : '';
            $nhomsanpham->tennhom=isset($_POST['tennhom']) ? $_POST['tennhom'] : '';
            $nhomsanpham->ghichu=isset($_POST['ghichu']) ? $_POST['ghichu'] : '';
            $nhomsanpham->update();
    }
    ?>

        <div class="container">
            <div class="account__form">
            <h2>Sửa Nhóm Sản Phẩm</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">ID Nhóm:</label>
                <input type="text" class="form-control" id="idd" name="idd"
                    value="<?php echo $row['id'] ?>" disabled >
                <input type="hidden" class="form-control" id="id" name="id"
                    value="<?php echo $row['id'] ?>" >
            </div>
            <div class="form-group">
                <label for="pwd">Tên Nhóm:</label>
                <input type="text" class="form-control" name="tennhom" value="<?php echo $row['tennhom'] ?> ">
            </div>
            <div class="form-group">
                <label for="email">ghi Chú:</label>
                <input type="text" class="form-control" name="ghichu" value="<?php echo $row['ghichu'] ?> ">
            </div>
           
            <button type="submit" class="btn btn-primary" name='ok'>Cập nhật</button>
            <a href="sanpham_nhom.php" class="btn btn-primary">Trở lại</a>
        </form>

        <?php
    
        ?>

        </div>