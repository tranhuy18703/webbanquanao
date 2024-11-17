<?php include "headerquantri.php";?>
<?php include "function_hoadon.php";?>
<?php
$hoadon = new hoadon();
$id = $_GET['id'];
$result = $hoadon->hienthiid($id);
$row = mysqli_fetch_array($result);
$hoadon->delete($id);
?>