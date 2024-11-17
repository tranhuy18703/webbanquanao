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

    $masp = isset($_GET['masp']) ? $_GET['masp'] : '';
    $sql = "SELECT * FROM `sanpham`WHERE masp='$masp' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
?>


        <div class="detail">
            <div class="grid wide">
                <div class="row">
                
                    <div class="col l-6">
                        <div class="detail-items">
                            <img src="./upload/<?php echo $row["img"] ?>" alt="" class="detail-items__img">
                        </div>
                    </div>
                    <div class="col l-6">
                        
                        <div class="detail-items">
                            <h3 class="detail-items__heading"><?php echo $row["tensp"] ?></h3>
                            <p class="detail-items__code">Mã sp: <?php echo $row["masp"] ?></p>
                            <div class="detail-items__price">
                                <span class="detail-items__price-new"><?php echo $row["dongia"] ?>₫</span>
                                <span class="detail-items__price-old"><?php echo $row["dongiaold"] ?>₫</span>
                                <span class="detail-items__price-sale">Sale</span>
                            </div>
                            <div class="detail-items__support">
                                <div class="detail-items__support-gr">
                                    <img src="assets/img/img_sup5.jpg" alt="" class="detail-items__support-gr-img">
                                    <div class="detail-items__support-gr-info">
                                        <h3 class="detail-items__support-gr-title">Miễn phí vận chuyển</h3>
                                        <p class="detail-items__support-gr-msg">Cho đơn hàng từ 499.000₫</p>
                                    </div>
                                </div>
                                <div class="detail-items__support-gr">
                                    <img src="assets/img/img_sup6.jpg" alt="" class="detail-items__support-gr-img">
                                    <div class="detail-items__support-gr-info">
                                        <h3 class="detail-items__support-gr-title">Miễn phí đổi, sửa hàng</h3>
                                        <p class="detail-items__support-gr-msg">Đổi hàng trong 30 ngày kể từ ngày mua , hỗ trợ sửa đổi miễn phí</p>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-items__warehouse">
                                <p class="detail-items__warehouse-remaining"><strong>Kho hàng còn</strong> : <?php echo $row["soluong"] ?> cái</p>
                            </div>
                            <form action="cart.php" method="post" class="detail-items__quantity">
                                <p class="detail-items__quantity-text">Số lượng:</p>
                                <input class="detail-items__quantity-num" type="number" name="soluong" min="1" max="10" value="1">
                                <input type="hidden" name="tensp" value="<?php echo $row["tensp"] ?>">
                                <input type="hidden" name="dongia" value="<?php echo $row["dongia"] ?>₫">
                                <input type="hidden" name="img" value="<?php echo $row["img"] ?>">
                                <input type="submit" value="Thêm vào giỏ hàng" name="addcart" class="detail-items__btn-cart"> 
                                <!-- <div class="detail-items__quantity-updown">
                                    <span class="minus">-</span>
                                    <span class="num">01</span>
                                    <span class="plus">+</span>
                                </div>
                                <script src="assets/js/main.js"></script> -->
                            </form>
                            <form action="cart.php" method="post" class="detail-items__btn">
                                <input type="hidden" name="soluong" value="1">
                                <input type="hidden" name="tensp" value="<?php echo $row["tensp"] ?>">
                                <input type="hidden" name="dongia" value="<?php echo $row["dongia"] ?>₫">
                                <input type="hidden" name="img" value="<?php echo $row["img"] ?>">
                                <input type="submit" value="Mua Ngay" name="addcart" class="detail-items__btn-buy" >
                            </form >
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        


