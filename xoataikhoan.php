<?php include "headerquantri.php";?>
<?php include "function_taikhoan.php";?>
<?php
$taikhoan = new taikhoan();
$tendangnhap = $_GET['tendangnhap'];
$result = $taikhoan->hienthiid($tendangnhap);
$row = mysqli_fetch_array($result);
$taikhoan->delete($tendangnhap);
?>
