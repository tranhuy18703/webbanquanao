        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "webbanquanao";

            // Bước 1: Tạo kết nối đến CSDL
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Kiểm tra kết nối
            if (!$conn) {
                die("Kết nối thất bại: " . mysqli_connect_error());
            }

            // Bước 2: Lấy danh sách nhóm tin tức
            $sql_nhom = "SELECT * FROM `tintuc_nhom`";
            $result_nhom = mysqli_query($conn, $sql_nhom);

            // Bước 3: Lấy tin tức theo nhóm (nếu có)
            $nhom_id = isset($_GET['nhom_id']) ? $_GET['nhom_id'] : 0;
            $sql = "SELECT * FROM tintuc";

            if ($nhom_id != 0) {
                $sql .= " WHERE nhom_id = '$nhom_id'";
            }

            $sql .= " LIMIT 9";

            $result = mysqli_query($conn, $sql);
        ?>
        <div class="col l-8">
            <h3 class="news-items__heading">Tin Tức</h3>
            <div class="row">
            <?php 

            while ($row= mysqli_fetch_assoc($result)) { ?> 
                <div class="col l-6">
                    <div class="news-items__category">
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
                </div>
                <?php 
                } 
            ?>
            </div>
        </div>
    </div>
</div>
</div>