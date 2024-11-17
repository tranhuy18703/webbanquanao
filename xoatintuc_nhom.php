<?php include "headerquantri.php";
include "function_tintuc.php";

$nhomtintuc = new nhomtintuc();
$id = $_GET['id'];
$result = $nhomtintuc->hienthiid($id);
$row = mysqli_fetch_array($result);

$nhomtintuc->delete($id);
?>