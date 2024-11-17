<?php include "headerquantri.php";?>
<?php include "function_lienhe.php";?>
<?php
$lienhe = new lienhe();
$hoten = $_GET['hoten'];
$result = $lienhe->hienthiid($hoten);
$row = mysqli_fetch_array($result);
$lienhe->delete($hoten);
?>
