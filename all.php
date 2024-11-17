<?php include "headernguoidung.php";?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webbanquanao";

    //B1: Create connetion
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    //check connection
    
    if (!$conn) {
        die("connection failer" . mysqli_connect_error());
    }
    //B2:
        $sql = "SELECT * 
        FROM sanpham ";
    //Bước 3
    $result = mysqli_query($conn, $sql);
?>
        <div class="all">
            <div class="all-banner">
                <img src="assets/img/all.jpg" alt="all-banner" class="all-banner__img">
            </div>
            <div class="all-product">
                <div class="grid wide">
                    <h3 class="product__heading">Tất Cả Sản Phẩm</h3>
                    <div class="row">
                    <?php while ($row= mysqli_fetch_assoc($result)) { ?>
                        <div class="col l-2-4">
                            <div class="product__items">
                                <div class="product__items-wrap">
                                    <a href="detail.php?masp=<?php echo $row["masp"] ?>" class="product__items-wrap-link">
                                        <img src="./upload/<?php echo $row["img"] ?>" alt=""  class="product__items-img">
                                    </a>
                                    <form action="cart.php" method="post" class="product__items-cart">
                                        <i class="product__items-cart-icon fa-solid fa-cart-plus"></i>
                                        <input type="submit" value="Thêm vào giỏ hàng" name="addcart" class="product__items-more-cart" >
                                        <input type="hidden" name="soluong" value="1">
                                        <input type="hidden" name="tensp" value="<?php echo $row["tensp"] ?>">
                                        <input type="hidden" name="dongia" value="<?php echo $row["dongia"] ?>₫">
                                        <input type="hidden" name="img" value="<?php echo $row["img"] ?>">   
                                    </form>
                                </div>
                                <div class="product__items-links">
                                    <a href = "detail.php?masp=<?php echo $row["masp"] ?>" class="product__items-name"><?php echo $row["tensp"] ?></a>
                                </div>
                                <div class="product__items-price">
                                    <span class="product__items-price-old"><?php echo $row["dongiaold"] ?>₫</span>
                                    <span class="product__items-price-new"><?php echo $row["dongia"] ?>₫</span>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
            </div>
        </div>

<?php include "footernguoidung.php";?>