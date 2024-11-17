<?php include "headerquantri.php"; 
      include "function_lienhe.php"; 
      $lienhe = new lienhe(); 
      $result = $lienhe->hienthi();
      $count= mysqli_num_rows($result); 
?>

    <div class="container">
    <h2 class="heading_admin">Quản Lý Liên Hệ</h2>
        <div class="account__form">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Điện thoại</th>
                        <th>Nội dung</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($count > 0){
                while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row["hoten"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td><?php echo $row["sdt"] ?></td>
                            <td><?php echo $row["ghichu"] ?></td>
                            <td>
                                <a href="xoalienhe.php?hoten=<?PHP echo $row["hoten"] ?>" style="text-decoration: none">Xóa</a>
                            </td>   
                        </tr>
                    <?php 
                }
                } ?>
                </tbody>
            </table>
        </div>
    </div>