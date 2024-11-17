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
            <div class="category__news">
                <div class="category__gr">
                    <h3 class="category__heading">Tin tức nổi bật</h3>
                    <ul class="category__list">
                    <?php 
                    $limit = 5; // Số lượng sản phẩm muốn hiển thị
                    $count = 0; // Biến đếm
                    while ($row= mysqli_fetch_assoc($result)) { 
                        if ($count >= $limit) {
                            break; // Dừng vòng lặp sau khi hiển thị đủ số lượng sản phẩm
                        }    
                    ?>
                        <li class="category__items">
                            <img class="category__items-img" src="./upload/<?php echo $row["img"] ?>" alt="">
                            <a href="news_detail.php?tentintuc=<?php echo $row["tentintuc"] ?>" class="category__items-text"><?php echo $row["tentintuc"] ?></a>
                        </li>
                    <?php 
                    $count++;    
                    } 
                    ?>
                    </ul>
                </div>
            </div>
        </div>