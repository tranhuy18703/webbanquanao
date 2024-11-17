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
                    FROM tintuc" ;
                //Bước 3
                $result = mysqli_query($conn, $sql);
            ?>
            <div class="news">
                <div class="grid wide">
                    <h3 class="product__heading">Tin Tức Thời Trang</h3>
                    <div class="row">
                        <?php 
                        $limit = 3; // Số lượng sản phẩm muốn hiển thị
                        $count = 0; // Biến đếm
                        while ($row= mysqli_fetch_assoc($result)) { 
                            if ($count >= $limit) {
                                break; // Dừng vòng lặp sau khi hiển thị đủ số lượng sản phẩm
                            }
                        ?> 
                        <div class="col l-4">
                            <div class="news-items">
                                <img src="./upload/<?php echo $row["img"] ?>" alt="news image" class="news-items__img">
                                <div class="news-items__info">
                                    <a href="news_detail.php?tentintuc=<?php echo $row["tentintuc"] ?>" class="news-items__title"><?php echo $row["tentintuc"] ?></a>
                                    <div class="news-items__permission">
                                        <span class="news-items__permission-team">
                                            <i class="fa-regular fa-user"></i>    
                                            <?php echo $row["tennguoidang"] ?>
                                        </span>
                                        <span class="news-items__permission-date">
                                            <i class="fa-regular fa-clock"></i>
                                            <?php echo $row["ngaydang"] ?>
                                        </span>
                                    </div>
                                    <p class="news-items__msg">
                                    <?php echo $row["mota"] ?>
                                    </p>
                                    <a href="news_detail.php?tentintuc=<?php echo $row["tentintuc"] ?>" class="news-items__links">
                                        Xem thêm
                                        <i class="news-items__links-icon fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php 
                        $count++;
                    } 
                    ?>
                    </div>
                </div>
            </div>
        </div>