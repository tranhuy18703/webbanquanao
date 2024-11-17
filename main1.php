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
        FROM sanpham";
    //Bước 3
    $result = mysqli_query($conn, $sql);


    
?>
<div class="container">
            <div class="slideshow-container">
                <div class="mySlides">
                    <img src="assets/img/imgslider.jpg">
                </div>
                <div class="mySlides">
                    <img src="assets/img/slides2.jpg">
                </div>
                <div class="mySlides">
                    <img src="assets/img/slides3.png">
                </div>
            </div>
              
            <script>
                let slideIndex = 0;
                showSlides();

                function showSlides() {
                    let i;
                    let slides = document.getElementsByClassName("mySlides");

                    // Ẩn tất cả các slides
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }

                    slideIndex++;
                    if (slideIndex > slides.length) {
                        slideIndex = 1;
                    }

                    // Hiển thị slide hiện tại
                    slides[slideIndex - 1].style.display = "block";

                    setTimeout(showSlides, 4000); // Thay đổi thời gian hiển thị ở đây (3000 -> 3 giây)
                }
            </script>
            <div class="support">
                <div class="grid wide">
                    <div class="row">
                        <div class="col c-3">
                            <div class="support__item">
                                <img src="assets/img/sup1.jpg" alt="img__sup" class="support__img">
                                <h3 class="support__heading">Miễn phí giao hàng</h3>
                                <p class="support__msg">Miễn phí ship với đơn hàng > 498K</p>
                            </div>
                        </div>
                        <div class="col c-3">
                            <div class="support__item">
                                <img src="assets/img/sup2.jpg" alt="img__sup" class="support__img">
                                <h3 class="support__heading">Thanh toán COD</h3>
                                <p class="support__msg">Thanh toán khi nhận hàng(COD)</p>
                            </div>
                        </div>
                        <div class="col c-3">
                            <div class="support__item">
                                <img src="assets/img/sup3.jpg" alt="img__sup" class="support__img">
                                <h3 class="support__heading">Khách hàng vip</h3>
                                <p class="support__msg">Ưu đãi dành cho khách hàng vip</p>
                            </div>
                        </div>
                        <div class="col c-3">
                            <div class="support__item">
                                <img src="assets/img/sup4.jpg" alt="img__sup" class="support__img">
                                <h3 class="support__heading">Hỗ trợ bảo hành</h3>
                                <p class="support__msg">Đổi , sửa đồ lại tất cả store</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product">
                <div class="grid wide">
                    <h3 class="product__heading">Sản Phẩm Hot</h3>
                    <div class="row">
                        <?php
                        $limit = 10; // Số lượng sản phẩm muốn hiển thị
                        $count = 0; // Biến đếm
                        while ($row= mysqli_fetch_assoc($result)) { 
                            if ($count >= $limit) {
                                break; // Dừng vòng lặp sau khi hiển thị đủ số lượng sản phẩm
                            }
                        ?>
                        <div class="col l-2-4">
                            <div class="product__items">
                                <div class="product__items-wrap">
                                    <a href="detail.php?masp=<?php echo $row["masp"] ?>" class="product__items-wrap-link">
                                        <img src="upload/<?php echo $row["img"] ?>" alt="" class="product__items-img">
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
                                    <a href="detail.php?masp=<?php echo $row["masp"] ?>" class="product__items-name"><?php echo $row["tensp"] ?></a>
                                </div>
                                <div class="product__items-price">
                                    <span class="product__items-price-old"><?php echo $row["dongiaold"] ?>₫</span>
                                    <span class="product__items-price-new"><?php echo $row["dongia"] ?>₫</span>
                                </div>
                            </div>
                        </div>
                        <?php 
                        $count++;
                        } ?>
                    </div>
                    <div class="product__button">
                        <a href="all.php" class="product__button-link">Xem tất cả</a>
                    </div>
                </div>
            </div>