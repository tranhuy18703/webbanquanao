<?php include "headerquantri.php";?>
<?php
  include "function_sanpham.php";?>
  <?php
  $sanpham = new sanpham();
  $masp = $_GET['masp']; 
  $result = $sanpham->hienthisanpham($masp); 
  $row = mysqli_fetch_array($result); 

  $tenanh = $row['img']; 

  $sanpham->deletesanpham($masp); 
  ?>

