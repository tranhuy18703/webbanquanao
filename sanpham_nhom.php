
<?php include "headerquantri.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
 <style>
  .heading {
        font-family: 'Roboto', sans-serif;
        padding:8px;
        border-color: orange;
        border-left-width: 20px;
        border-style: solid;
        border-radius: 10px;
    }
 </style>
</head>

<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webbanquanao";

// Bước 1: Tạo kết nối
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Bước 2: Thực hiện truy vấn để lấy danh sách sản phẩm nhóm
$sql = "SELECT * FROM `sanpham_nhom`";
$result = mysqli_query($conn, $sql);

?>

<div class="example">
    <div class="container">
        <div class="row">
            <h2 class="heading_admin">Quản Lý Nhóm Sản Phẩm</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Ghi Chú</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td class = "info__product-gr"><?php echo $row["id"]; ?></td>
                            <td class = "info__product-gr"><?php echo $row["tennhom"]; ?></td>
                            <td class = "info__product-gr"><?php echo $row["ghichu"]; ?></td>
                            <td>
                                <a class="link_admin link_admin-fix" href="suasanpham_nhom.php?id=<?php echo $row["id"]; ?>" style="text-decoration: none">Sửa</a>
                                <a class="link_admin link_admin-delete" href="xoasanpham_nhom.php?id=<?php echo $row["id"]; ?>" style="text-decoration: none">Xóa</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <button><a href="themsanpham_nhom.php" style="text-decoration: none; color: black;">Thêm Nhóm Sản Phẩm</a></button>
        </div>
    </div>
</div>

<?php
// Đóng kết nối
mysqli_close($conn);
?>
</body>

</html>