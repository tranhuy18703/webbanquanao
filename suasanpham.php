<?php include "headerquantri.php";?>
<?php include "function_sanpham.php";
    $sanpham = new sanpham();
    $masp = $_GET['masp']; 
    $result_nhom = $sanpham->hienthinhom();
    $result = $sanpham->hienthisanpham($masp);
    $row = mysqli_fetch_array($result); 
    if(isset($_POST['ok'])){
        $sanpham->masanpham  = isset($_POST['masanpham']) ? $_POST['masanpham'] : '';
        $sanpham->nhomid = isset($_POST['nhom_id']) ? $_POST['nhom_id'] : 0;
        $sanpham->tensanpham  = isset($_POST['tensp']) ? $_POST['tensp'] : '';
        $sanpham->mota= isset($_POST['mota']) ? $_POST['mota'] : '';
        $sanpham->dongia = isset($_POST['dongia']) ? $_POST['dongia'] : '';
        $sanpham->dongiaold = isset($_POST['dongiaold']) ? $_POST['dongiaold'] : '';
        $sanpham->soluong = isset($_POST['soluong']) ? $_POST['soluong'] : '';
        $sanpham->enable = isset($_POST['enable']) ? $_POST['enable'] : 0;
        $sanpham->ghichu = isset($_POST['ghichu']) ? $_POST['ghichu'] : '';

        $sanpham->updatesanpham();
    }
    ?>
    <div class="container">
        <h2>Sửa Sản Phẩm</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
            <label for="nhom_id">Nhóm Sản Phẩm:</label>
            <select class="form-control" id="nhom_id" name="nhom_id">
                <?php while ($row_nhom = mysqli_fetch_assoc($result_nhom)) { ?>
                    <option value="<?php echo $row_nhom["id"] ?>"><?php if($row_nhom["id"]==$row["nhom_id"])?>
                        <?php echo $row_nhom["tennhom"] ?>
                    </option>
                <?php } ?>
            </select>
            </div>

            <div class="form-group">
                <label for="masp">Mã Sản Phẩm</label>
                <input type="text" class="form-control" id="ma" name="ma"
                    value="<?php echo $row['masp'] ?>" disabled > <!--dùng dể trang trí cho đẹp cố định k cho sửa-->
                    <input type="hidden" class="form-control" id="masanpham" name="masanpham"
                     value="<?php echo $row['masp'] ?>" ><!-- // cho hidden để ẩn đi lấy biến truyền giá trị  -->
            </div>

            <div class="form-group">
                <label for="tensp">Tên sản Phẩm:</label>
                <input type="text" class="form-control" name="tensp" value="<?php echo $row["tensp"] ?> ">
            </div>
            <div class="form-group">
                <label for="mota">Mô Tả:</label>
                <textarea type="text" class="form-control"  rows="5" name="mota" ><?php echo $row["mota"] ?> </textarea>
            </div>
            <div class="form-group">
                <label for="dongia">Đơn giá:</label>
                <input type="number" value="<?php echo $row['dongia'];?>"class="form-control" name="dongia" >
            </div>
            <div class="form-group">
                <label for="dongia">Đơn giá Cũ:</label>
                <input type="number" value="<?php echo $row['dongiaold'];?>"class="form-control" name="dongiaold" >
            </div>
            <div class="form-group">
                <label for="soluong">Số Lượng:</label>
                <input type="number" value="<?php echo $row['soluong'];?>"class="form-control" name="soluong" >
            </div>
            <div class="form-group">
                <label for="img">Ảnh Đại Diện:</label>
                <input type="file" class="form-control" name="img" value="<?php echo $row['img'] ?> ">
                <img src="./upload/<?php echo $row["img"]?>"width="60px" height="80px">
            </div>
            <div class="form-group">
                <label for="mota">Ghi chú:</label>
                <textarea  class="form-control"  rows="3" name="ghichu"><?php  echo $row['ghichu'] ?> </textarea>
            </div>
            <div class="form-group form-check">
                
                <input class="form-check-input" type="checkbox" name="enable" value="1" <?php if ($row['enable'] == 1)
                        echo "checked" ?> >Hiển Thị</label>
            </div>
            <button type="submit" class="btn btn-primary" name="ok">Cập nhật</button>
            <a href="sanpham.php" class="btn btn-primary">Trở lại</a>
        </form>
    </div>
</body>

</html>