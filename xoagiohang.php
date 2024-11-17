<?php include "headerquantri.php";?>
<?php include "function_giohang.php";?>
<?php
$giohang = new giohang();
$id = $_GET['id'];
$result = $giohang->hienthiid($id);
$row = mysqli_fetch_array($result);
$giohang->delete($id);
?>