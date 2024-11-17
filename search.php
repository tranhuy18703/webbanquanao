<?php include "headernguoidung.php"; ?>
<?php

if(isset($_POST['timkiem'])) {
    $tukhoa = $_POST['tukhoa'];
} else {
    $tukhoa = '';
}
$sql = "SELECT * FROM sanpham WHERE tensp LIKE '%".$tukhoa."%'";
$result=mysqli_query($conn,$sql);

?>

        <div class="all">
            <div class="all-banner">
                <img src="assets/img/all.jpg" alt="all-banner" class="all-banner__img">
            </div>
            <div class="all-product">
                <div class="grid wide">
                    <h3 class="product__heading">Từ khóa tìm kiếm : <?php echo $_POST["tukhoa"]?> </h3>
                    <div class="row">
                    <?php while ($row= mysqli_fetch_assoc($result)) { ?>
                        <div class="col l-2-4">
                            <div class="product__items">
                                <div class="product__items-wrap">
                                    <a href="detail.php?masp=<?php echo $row["masp"] ?>" class="product__items-wrap-link">
                                        <img src="./upload/<?php echo $row["img"] ?>" alt=""  class="product__items-img">
                                    </a>
                                    <a href="#!" class="product__items-cart">
                                        <i class="product__items-cart-icon fa-solid fa-cart-plus"></i>
                                        <span class="product__items-more-cart"> Thêm vào giỏ hàng </span>
                                    </a>
                                </div>
                                <div class="product__items-links">
                                    <a href = "detail.php?masp=<?php echo $row["masp"] ?>" class="product__items-name"><?php echo $row["tensp"] ?></a>
                                </div>
                                <div class="product__items-price">
                                    <span class="product__items-price-old">140.000₫</span>
                                    <span class="product__items-price-new"><?php echo $row["dongia"] ?>₫</span>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
            </div>
        </div>

<?php include "footernguoidung.php"; ?>

