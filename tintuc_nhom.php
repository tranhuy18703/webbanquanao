<?php
include "headerquantri.php";
include "function_tintuc.php";

$tintucnhom = new nhomtintuc();
$result = $tintucnhom->hienthinhom();
$count = mysqli_num_rows($result);
?>
<div class="example">
    <div class="container">
        <div class="row">
            <h2 class="heading_admin">Quản Lý Nhóm Tin Tức</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Nhóm Tin Tức</th>
                        <th>Ghi Chú</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td class = "info__product-gr"><?php echo $row["id"]; ?></td>
                        <td class = "info__product-gr"><?php echo $row["tennhom"]; ?></td>
                        <td class = "info__product-gr"><?php echo $row["ghichu"]; ?></td>
                        <td>
                            <a class="link_admin link_admin-fix" href="suatintuc_nhom.php?id=<?php echo $row["id"]; ?>" style="text-decoration: none">Sửa</a>
                            <a class="link_admin link_admin-delete" href="xoatintuc_nhom.php?id=<?php echo $row["id"]; ?>" style="text-decoration: none">Xóa</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <div class="link_admin-footer">
                        <a class="link_admin-btn" href="themtintuc_nhom.php" >Thêm Nhóm Tin Tức</a>
                </div>
        </div>
    </div>
</div>