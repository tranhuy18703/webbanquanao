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
            <div class="new-products">
                <div class="grid wide">
                    <h3 class="product__heading">Hàng Mới Về</h3>
                    <div class="row">
                        <div class="col l-4-9">
                            <img src="assets/img/banner_new.jpg" alt="Banner news product" class="new-product__img">
                        </div>
                        <div class="col l-7-2">
                            <div class="row">
                                <?php 
                                $limit = 6; // Số lượng sản phẩm muốn hiển thị
                                $count = 0; // Biến đếm
                                while ($row= mysqli_fetch_assoc($result)) { 
                                    if ($count >= $limit) {
                                        break; // Dừng vòng lặp sau khi hiển thị đủ số lượng sản phẩm
                                    }
                                ?>
                                <div class="col l-4">
                                    <div class="product__items">
                                        <div class="product__items-wrap">
                                            <a href="detail.php?masp=<?php echo $row["masp"] ?>" class="product__items-wrap-link">
                                                <img src="./upload/<?php echo $row["img"] ?>" alt="" class="product__items-img">
                                            </a>

                                            <form action="cart.php" method="post" class="product__items-cart">
                                                <i class="product__items-cart-icon fa-solid fa-cart-plus"></i>
                                                <input type="submit" value="Thêm vào giỏ hàng" name="addcart" class="product__items-more-cart">
                                                <input type="hidden" name="soluong" min="1" max="10" value="1">
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
                                <?php 
                                $count++;
                            } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>